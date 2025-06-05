<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            [
                'name' => 'Website Redesign',
                'deadline' => now()->addMonth(),
                'price' => 10000,
                'working_hour' => 120,
                'status' => 'active',
                'description' => 'Redesign the company website',
                'currency_id' => 1,
                'contactcustomer_id' => 1,
                'group_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile App',
                'deadline' => now()->addMonths(2),
                'price' => 20000,
                'working_hour' => 200,
                'status' => 'pending',
                'description' => 'Develop a mobile app',
                'currency_id' => 2,
                'contactcustomer_id' => 2,
                'group_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CRM Integration',
                'deadline' => now()->addMonths(3),
                'price' => 15000,
                'working_hour' => 150,
                'status' => 'completed',
                'description' => 'Integrate CRM system',
                'currency_id' => 3,
                'contactcustomer_id' => 3,
                'group_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SEO Optimization',
                'deadline' => now()->addMonths(4),
                'price' => 8000,
                'working_hour' => 80,
                'status' => 'active',
                'description' => 'SEO for main site',
                'currency_id' => 4,
                'contactcustomer_id' => 4,
                'group_id' => 4,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cloud Migration',
                'deadline' => now()->addMonths(5),
                'price' => 25000,
                'working_hour' => 300,
                'status' => 'pending',
                'description' => 'Migrate to cloud',
                'currency_id' => 5,
                'contactcustomer_id' => 5,
                'group_id' => 5,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
