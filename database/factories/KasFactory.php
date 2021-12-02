<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->name();
        $slug = Str::slug($nama, '-');

        return [
            'nama' => $nama,
            'slug' => $slug,
            'id_user' => User::all()->random()->id,
            'target' => $this->faker->numberBetween(1000000, 1100000),
        ];
    }
}
