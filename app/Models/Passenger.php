<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','middle_name','last_name','date_of_birth','nationality','gender','isCharterer','company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function travelDocuments()
    {
        return $this->hasMany(TravelDocument::class);
    }

}
