<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leg extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'trip_id',    // Assuming each leg is associated with a trip
        'from_location',
        'to_location',
        'date',
        'time',
        'pax',        // Number of passengers for this leg
    ];

    // Define the relationship with the Trip model
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    // Additional methods and properties as needed
}
