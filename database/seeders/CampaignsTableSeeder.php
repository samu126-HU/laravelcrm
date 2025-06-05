<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('campaigns')->insert([
            [
                'name' => 'Spring Sale',
                'subject' => 'Big Discounts!',
                'body' => 'Enjoy our spring sale.',
                'sent' => 'no',
                'group_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Summer Promo',
                'subject' => 'Hot Deals!',
                'body' => 'Summer deals for everyone.',
                'sent' => 'no',
                'group_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Autumn Offer',
                'subject' => 'Falling Prices!',
                'body' => 'Autumn offers are here.',
                'sent' => 'no',
                'group_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Winter Blast',
                'subject' => 'Cool Savings!',
                'body' => 'Winter savings event.',
                'sent' => 'no',
                'group_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Year End',
                'subject' => 'Final Sale!',
                'body' => 'Year end clearance.',
                'sent' => 'no',
                'group_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
