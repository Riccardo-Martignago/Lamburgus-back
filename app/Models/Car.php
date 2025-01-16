<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'model',
        'brand',
        'year',
        'license_plate',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function rentalPlans() {
        return $this->hasMany(RentalPlan::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
