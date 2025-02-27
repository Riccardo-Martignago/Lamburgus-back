<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 3, // Customer User
                'company_id' => 1,
                'car_id' => 1, // Toyota Corolla
                'pickup_location_id' => 1, // Rome
                'dropoff_location_id' => 2, // Milan
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-25',
                'total_price' => 250.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3, // Customer User
                'company_id' => 2,
                'car_id' => 2, // Ford Focus
                'pickup_location_id' => 2, // Milan
                'dropoff_location_id' => 1, // Rome
                'start_date' => '2025-02-01',
                'end_date' => '2025-02-05',
                'total_price' => 300.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
