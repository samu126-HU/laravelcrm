<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '987654321',
                'address' => '456 Side St',
                'description' => 'Main contact',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '876543210',
                'address' => '789 Jane Ave',
                'description' => 'Secondary contact',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Brown',
                'email' => 'alice@example.com',
                'phone' => '765432109',
                'address' => '101 Alice Rd',
                'description' => 'Project manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob White',
                'email' => 'bob@example.com',
                'phone' => '654321098',
                'address' => '202 Bob Blvd',
                'description' => 'Support',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carol Black',
                'email' => 'carol@example.com',
                'phone' => '543210987',
                'address' => '303 Carol St',
                'description' => 'Sales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
