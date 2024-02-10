<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'passenger_id',
        'start_date',
        'routing',
        'status',
        // Add 'unique_trip_id' to fillable if you're setting it manually
    ];

    // Relationship with the Leg model
    public function legs()
    {
        return $this->hasMany(Leg::class, 'trip_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($trip) {
            // Generate and set unique_trip_id here if not set
            if (empty($trip->unique_trip_id)) {
                $trip->unique_trip_id = $trip->generateUniqueTripIdUsingId($trip->id);
            }
        });
    }

    // Generate a unique trip ID using the trip's ID
    public function generateUniqueTripIdUsingId($id)
    {
        $datePart = now()->format('m-Y');
        return "{$datePart}/{$id}";
    }

     /**
     * Set the routing attribute to uppercase.
     *
     * @param  string  $value
     * @return void
     */
    public function setRoutingAttribute($value)
    {
        $this->attributes['routing'] = strtoupper($value);
    }
}
