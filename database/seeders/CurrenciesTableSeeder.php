<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('currencies')->insert([
            ['name' => 'Forint', 'currency' => 'HUF', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Euro', 'currency' => 'EUR', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dollar', 'currency' => 'USD', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pound', 'currency' => 'GBP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Yen', 'currency' => 'JPY', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
