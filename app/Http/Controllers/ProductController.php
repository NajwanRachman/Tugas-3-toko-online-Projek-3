<?php
namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('stok', '>', 0)
            ->orderBy('nama_barang')
            ->get();

        return view('home', compact('products'));
    }
}
