<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummitRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'summit_id'];
}
