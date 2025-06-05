<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactCustomersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact_customers')->insert([
            [
                'contact_id' => 1,
                'customer_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'contact_id' => 2,
                'customer_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'contact_id' => 3,
                'customer_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'contact_id' => 4,
                'customer_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'contact_id' => 5,
                'customer_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
