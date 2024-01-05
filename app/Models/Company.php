<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name','company_street','company_postcode','company_city','company_country','company_tax_id'];
    use HasFactory;
}
