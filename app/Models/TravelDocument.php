<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDocument extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'passenger_id', 
        'country', 
        'document_number', 
        'issuing_date', 
        'expiry_date', 
        'isPrimary'
    ];

    /**
     * Get the passenger that owns the travel document.
     */
    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    /**
     * Set the document as primary and unset other documents as primary.
     */
    public function setAsPrimary()
    {
        // Begin a transaction
        \DB::transaction(function () {
            // Set all other documents of the passenger as non-primary
            self::where('passenger_id', $this->passenger_id)
                ->where('id', '!=', $this->id)
                ->update(['isPrimary' => false]);

            // Set this document as primary
            $this->primary = true;
            $this->save();
        });
    }
}