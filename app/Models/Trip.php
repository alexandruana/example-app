<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'trip_name',
        'start_date',
        'end_date',
        'status'
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }


}
