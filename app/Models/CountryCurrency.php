<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCurrency extends Model
{
    use HasFactory;


    protected $fillable = [
        'country','currency','exchange_rate','last_updated'
    ];

}
