<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','middle_name','last_name','dob','nationality','doc_type','doc_number','doc_expiry','company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
