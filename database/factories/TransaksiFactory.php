<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaksi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pemasukan = $this->faker->numberBetween(1000000, 1200000);
        $pengeluaran = $this->faker->numberBetween(1000000, 1200000);
        $keuntungan = $pemasukan - $pengeluaran;

        return [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'keuntungan' => ($keuntungan < 0) ? 0 : $keuntungan,
        ];
    }
}
