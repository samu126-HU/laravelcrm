<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customer_types')->insert([
            ['name' => 'Business'],
            ['name' => 'Individual'],
            ['name' => 'Nonprofit'],
            ['name' => 'Government'],
            ['name' => 'Startup'],
        ]);
    }
}
