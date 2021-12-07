<?php

namespace Database\Seeders;

use App\Models\Kas;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(1)->create();
        Kas::factory(20)->create();
        Transaksi::factory(1000)->create();
    }
}
