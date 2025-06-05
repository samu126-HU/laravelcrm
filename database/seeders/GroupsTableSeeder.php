<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name' => 'VIP',
                'description' => 'VIP Customers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular',
                'description' => 'Regular group',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Partners',
                'description' => 'Partners group',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suppliers',
                'description' => 'Suppliers group',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Testers',
                'description' => 'Testers group',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
