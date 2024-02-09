<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // Define the table if it's not the pluralized form of the model name
    // protected $table = 'trips';

    // Mass assignable attributes
    protected $fillable = [
        'passenger_id',
        'first_name',
        'last_name',
        'start_date',
        'routing',
        'status',
    ];

    // Define the relationship with the Passenger model
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }
}
