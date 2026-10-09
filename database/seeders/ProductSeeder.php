<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'id_barang' => 'BRG001',
                'nama_barang' => 'Nike Kobe 4 Protro',
                'deskripsi' => 'Sepatu basket dewasa seri Kobe 4 Protro.',
                'harga' => 2499000,
                'stok' => 10,
                'gambar' => 'images/images.jpg',
            ],
            [
                'id_barang' => 'BRG002',
                'nama_barang' => 'Nike Kobe 5 Protro',
                'deskripsi' => 'Sepatu basket dewasa dengan desain Kobe 5 Protro.',
                'harga' => 5000000,
                'stok' => 10,
                'gambar' => 'images/images (1).jpg',
            ],
            [
                'id_barang' => 'BRG003',
                'nama_barang' => 'Nike Kobe 6 Protro',
                'deskripsi' => 'Sepatu basket dewasa seri Kobe 6 Protro.',
                'harga' => 12000000,
                'stok' => 10,
                'gambar' => 'images/images (2).jpg',
            ],
            [
                'id_barang' => 'BRG004',
                'nama_barang' => 'Nike Kobe 8 Protro',
                'deskripsi' => 'Sepatu basket dewasa dengan desain ringan Kobe 8.',
                'harga' => 2849000,
                'stok' => 8,
                'gambar' => 'images/images (3).jpg',
            ],
            [
                'id_barang' => 'BRG005',
                'nama_barang' => 'Nike Kobe 9 Protro',
                'deskripsi' => 'Sepatu basket dewasa seri Kobe 9 Protro.',
                'harga' => 2849000,
                'stok' => 8,
                'gambar' => 'images/IH1401-402-1.jpg',
            ],
            [
                'id_barang' => 'BRG007',
                'nama_barang' => 'Nike G.T. Cut 1',
                'deskripsi' => 'Sepatu basket dewasa seri G.T. Cut generasi pertama.',
                'harga' => 2499000,
                'stok' => 7,
                'gambar' => '/images/images (5).jpg',
            ],
            [
                'id_barang' => 'BRG008',
                'nama_barang' => 'Nike G.T. Cut 2',
                'deskripsi' => 'Sepatu basket dewasa seri G.T. Cut generasi kedua.',
                'harga' => 2299000,
                'stok' => 7,
                'gambar' => 'images/images (6).jpg',
            ],
            [
                'id_barang' => 'BRG009',
                'nama_barang' => 'Nike G.T. Cut 3 EP',
                'deskripsi' => 'Sepatu basket dewasa untuk permainan dinamis.',
                'harga' => 3049000,
                'stok' => 10,
                'gambar' => 'images/images (7).jpg',
            ],
            [
                'id_barang' => 'BRG006',
                'nama_barang' => 'Nike GT CUT 4',
                'deskripsi' => 'Sepatu basket dewasa seri GT CUT 4.',
                'harga' => 3169000,
                'stok' => 6,
                'gambar' => 'images/images (4).jpg',
            ],
            [
                'id_barang' => 'BRG010',
                'nama_barang' => 'Nike Sabrina 3 EP',
                'deskripsi' => 'Sepatu basket dewasa seri Sabrina 3.',
                'harga' => 2099000,
                'stok' => 10,
                'gambar' => 'images/IQ9033-401-1.jpg',
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['id_barang' => $product['id_barang']],
                array_merge($product, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
