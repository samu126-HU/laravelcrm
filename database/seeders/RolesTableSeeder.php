<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user', 'display_name' => 'User', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'manager', 'display_name' => 'Manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'guest', 'display_name' => 'Guest', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'support', 'display_name' => 'Support', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
