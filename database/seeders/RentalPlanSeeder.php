<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class RentalPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rental_plans')->insert([
            [
                'location_id' => 1, // Rome
                'car_id' => 1, // Toyota Corolla
                'daily_rate' => 50.00,
                'hourly_rate' => 10.00,
                'available_from' => '2025-01-01',
                'available_to' => '2025-12-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'location_id' => 2, // Milan
                'car_id' => 2, // Ford Focus
                'daily_rate' => 60.00,
                'hourly_rate' => 12.00,
                'available_from' => '2025-01-01',
                'available_to' => '2025-12-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
