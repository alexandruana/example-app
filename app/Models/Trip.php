<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Trip extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'passenger_id',
        'unique_trip_id', // Ensure this is also fillable
        'start_date',
        'routing',
        'status',
    ];

    // Define the relationship with the Passenger model
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Add a creating event to generate unique_trip_id before saving a new Trip
        static::creating(function ($trip) {
            if (empty($trip->unique_trip_id)) { // Check if unique_trip_id is not already set
                $trip->unique_trip_id = static::generateUniqueTripId();
            }
        });
    }

    protected static function generateUniqueTripId()
    {
        $datePart = now()->format('m-Y');
        $key = 'trip_id_' . $datePart;

        // Retrieve the last sequential number for this month and year, or start with 0
        $lastSequentialId = Cache::get($key, 0);

        // Increment the sequential ID
        $newSequentialId = $lastSequentialId + 1;

        // Store the new sequential ID in the cache with an expiration (e.g., 2 months to ensure it persists through the entire month and a bit beyond)
        Cache::put($key, $newSequentialId, now()->addMonths(2));

        // Combine the date part and the new sequential ID
        $uniqueTripId = "{$datePart}/{$newSequentialId}";

        return $uniqueTripId;
    }
}
