<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'kode_kategori' => 'KAT001',
                'nama_kategori' => 'Teknologi Informasi',
                'deskripsi' => 'Buku pemrograman, komputer, dan teknologi.',
            ],
            [
                'kode_kategori' => 'KAT002',
                'nama_kategori' => 'Sistem Informasi',
                'deskripsi' => 'Buku analisis sistem dan manajemen informasi.',
            ],
            [
                'kode_kategori' => 'KAT003',
                'nama_kategori' => 'Basis Data',
                'deskripsi' => 'Buku database, SQL, dan data management.',
            ],
            [
                'kode_kategori' => 'KAT004',
                'nama_kategori' => 'Kecerdasan Buatan',
                'deskripsi' => 'Buku AI, machine learning, dan data science.',
            ],
            [
                'kode_kategori' => 'KAT005',
                'nama_kategori' => 'Bisnis dan Manajemen',
                'deskripsi' => 'Buku kewirausahaan dan manajemen bisnis.',
            ],
        ];

        foreach ($kategori as $data) {
            Kategori::updateOrCreate(
                ['kode_kategori' => $data['kode_kategori']],
                $data
            );
        }
    }
}
