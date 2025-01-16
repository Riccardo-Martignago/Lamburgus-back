<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];

    public function companies() {
        return $this->hasMany(Company::class);
    }

    public function rentalPlans() {
        return $this->hasMany(RentalPlan::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class, 'pickup_location_id')
                    ->orWhere('dropoff_location_id', $this->id);
    }
}
