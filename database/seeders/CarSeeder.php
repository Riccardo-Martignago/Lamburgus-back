<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'company_id' => 1,
                'model' => 'Toyota Corolla',
                'brand' => 'Toyota',
                'year' => '2020',
                'license_plate' => 'ABC123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_id' => 2,
                'model' => 'Ford Focus',
                'brand' => 'Ford',
                'year' => '2021',
                'license_plate' => 'XYZ789',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
