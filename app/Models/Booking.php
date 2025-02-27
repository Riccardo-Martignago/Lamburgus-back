<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'company_id',
        'pickup_location_id',
        'dropoff_location_id',
        'start_date',
        'end_date',
        'total_price',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function car() {
        return $this->belongsTo(Car::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function pickupLocation() {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }

    public function dropoffLocation() {
        return $this->belongsTo(Location::class, 'dropoff_location_id');
    }
}
