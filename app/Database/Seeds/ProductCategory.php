<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategory extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'nama'        => 'Electronics',
                'slug'        => 'electronics',
                'deskripsi'   => 'Electronic devices and gadgets',
                'created_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'nama'        => 'Clothing',
                'slug'        => 'clothing',
                'deskripsi'   => 'Men and women clothing',
                'created_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'nama'        => 'Books',
                'slug'        => 'books',
                'deskripsi'   => 'Various books and literature',
                'created_at'  => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product_categoy')->insert($item);
        }
    }
}