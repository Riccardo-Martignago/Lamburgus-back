<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'location_id',
        'daily_rate',
        'hourly_rate',
        'available_from',
        'available_to',
    ];

    public function car() {
        return $this->belongsTo(Car::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }
}
