<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $products = Product::whereIn('id_barang', array_keys($cart))
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

        return view('cart.index', compact('items', 'total'));
    }

    public function add(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stok < 1) {
            return back()->with('error', 'Stok produk habis.');
        }

        $cart = session()->get('cart', []);
        $quantity = (int) ($cart[$id] ?? 0);

        if ($quantity + 1 > $product->stok) {
            return back()->with(
                'error',
                'Jumlah produk di keranjang sudah mencapai stok tersedia.'
            );
        }

        $cart[$id] = $quantity + 1;
        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($id);
        $quantity = (int) $request->quantity;

        if ($quantity > $product->stok) {
            return back()->with(
                'error',
                'Jumlah pembelian tidak boleh melebihi stok.'
            );
        }

        $cart = session()->get('cart', []);
        $cart[$id] = $quantity;

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    public function remove(string $id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
