<?php

namespace Database\Factories;

use App\Models\Transaksi;
use App\Models\User;
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
        return [
            'id_user' => function () {
                return User::factory()->create()->id;
            },
            'id_transaksi' => function () {
                return Transaksi::factory()->create()->id;
            },
            'target' => $this->faker->numberBetween(1000000, 1100000),
        ];
    }
}
