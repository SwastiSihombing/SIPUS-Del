<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'isbn' => fake()->unique()->numerify('978602########'),
            'judul' => fake()->sentence(4),
            'penulis' => fake()->name(),
            'penerbit' => fake()->company(),
            'tahun_terbit' => fake()->numberBetween(2018, 2026),
            'stok' => fake()->numberBetween(0, 50),
            'sinopsis' => fake()->paragraph(),
            'kategori_id' => Kategori::query()->inRandomOrder()->value('id'),
        ];
    }
}
