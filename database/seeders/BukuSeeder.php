<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $jumlahBuku = Buku::count();
        $targetBuku = 20;

        if ($jumlahBuku < $targetBuku) {
            Buku::factory()
                ->count($targetBuku - $jumlahBuku)
                ->create();
        }
    }
}
