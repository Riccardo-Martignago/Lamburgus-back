<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'user_id' => 2, // Manager ID
                'location_id' => 1,
                'name' => 'Best Car Rentals',
                'email' => 'contact@bestcars.com',
                'phone_number' => '1234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2, // Manager ID
                'location_id' => 2,
                'name' => 'Global Rentals',
                'email' => 'support@globalrentals.com',
                'phone_number' => '9876543210',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
