<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    protected $model = Buku::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(3),
            'penulis' => $this->faker->name(),
            'harga' => $this->faker->numberBetween(10000, 50000),
            'tgl_terbit' => $this->faker->date(),
        ];
    }
}