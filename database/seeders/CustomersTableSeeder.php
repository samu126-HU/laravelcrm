<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Acme Corp',
                'email' => 'info@acme.com',
                'phone' => '123456789',
                'address' => '123 Main St',
                'description' => 'A business customer',
                'customer_type_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beta LLC',
                'email' => 'contact@beta.com',
                'phone' => '234567890',
                'address' => '234 Beta Ave',
                'description' => 'Another business',
                'customer_type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gamma Nonprofit',
                'email' => 'hello@gamma.org',
                'phone' => '345678901',
                'address' => '345 Gamma Blvd',
                'description' => 'Nonprofit org',
                'customer_type_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Delta Startup',
                'email' => 'team@delta.io',
                'phone' => '456789012',
                'address' => '456 Delta Rd',
                'description' => 'Startup',
                'customer_type_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Epsilon Gov',
                'email' => 'contact@epsilon.gov',
                'phone' => '567890123',
                'address' => '567 Epsilon St',
                'description' => 'Government',
                'customer_type_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
