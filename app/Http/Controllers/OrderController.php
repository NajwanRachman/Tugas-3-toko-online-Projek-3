<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->where('id_user', Auth::id())
            ->orderByDesc('tanggal_order')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(string $id)
    {
        $order = DB::table('orders')
            ->where('id_order', $id)
            ->where('id_user', Auth::id())
            ->first();

        if (!$order) {
            abort(404);
        }

        $details = DB::table('order_details')
            ->join(
                'products',
                'order_details.id_barang',
                '=',
                'products.id_barang'
            )
            ->where('order_details.id_order', $id)
            ->select(
                'order_details.id_barang',
                'products.nama_barang',
                'order_details.harga_satuan',
                'order_details.jumlah_beli'
            )
            ->get();

        return view('orders.show', compact('order', 'details'));
    }
}
