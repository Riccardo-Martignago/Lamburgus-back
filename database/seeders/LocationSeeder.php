<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['name' => 'Rome', 'latitude' => 41.9028, 'longitude' => 12.4964,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),],
            ['name' => 'Milan', 'latitude' => 45.4642, 'longitude' => 9.1900,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),],
            ['name' => 'Florence', 'latitude' => 43.7696, 'longitude' => 11.2558,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),],
        ]);
    }
}
