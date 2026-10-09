<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $products = DB::table('products')
            ->whereIn('id_barang', array_keys($cart))
            ->get()
            ->keyBy('id_barang');

        $items = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            if (!isset($products[$id])) {
                continue;
            }

            $product = $products[$id];
            $subtotal = (float) $product->harga * $quantity;

            $items[] = [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
            ];

            $total += $subtotal;
        }

        return view('checkout.index', compact('items', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => ['required', 'string', 'max:1000'],
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        try {
            DB::transaction(function () use ($cart, $request) {
                $products = DB::table('products')
                    ->whereIn('id_barang', array_keys($cart))
                    ->orderBy('id_barang')
                    ->lockForUpdate()
                    ->get()
                    ->keyBy('id_barang');

                $total = 0;

                foreach ($cart as $id => $quantity) {
                    if (!isset($products[$id])) {
                        throw new \RuntimeException(
                            'Ada produk di keranjang yang sudah tidak tersedia.'
                        );
                    }

                    $product = $products[$id];

                    if ($quantity < 1 || $quantity > $product->stok) {
                        throw new \RuntimeException(
                            'Stok ' . $product->nama_barang .
                            ' tidak mencukupi. Silakan periksa keranjang.'
                        );
                    }

                    $total += (float) $product->harga * $quantity;
                }

                $orderId = 'ORD' . now()->format('ymdHis');

                DB::table('orders')->insert([
                    'id_order' => $orderId,
                    'id_user' => Auth::id(),
                    'tanggal_order' => now(),
                    'total_harga' => $total,
                    'alamat_pengiriman' => $request->alamat_pengiriman,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                foreach ($cart as $id => $quantity) {
                    $product = $products[$id];

                    DB::table('order_details')->insert([
                        'id_order' => $orderId,
                        'id_barang' => $id,
                        'harga_satuan' => $product->harga,
                        'jumlah_beli' => $quantity,
                    ]);

                    DB::table('products')
                        ->where('id_barang', $id)
                        ->decrement('stok', $quantity);
                }
            });
        } catch (\Throwable $e) {
            report($e);

            $message = $e instanceof \RuntimeException
                ? $e->getMessage()
                : 'Pesanan gagal diproses. Silakan coba kembali.';

            return back()->withInput()->with('error', $message);
        }

        session()->forget('cart');

        return redirect()->route('home')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
