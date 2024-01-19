<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'passenger_id', 
        'country', 
        'document_number', 
        'issuing_date', 
        'expiry_date', 
        'isDefault'
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }
}
