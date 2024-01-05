<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected $fillable = ['company_name','company_street','company_postcode','company_city','company_country','company_tax_id','client_id'];
    use HasFactory;
}
