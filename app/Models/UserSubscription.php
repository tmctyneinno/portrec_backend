<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;
    protected $fillable = ['subscription_id', 'user_id', 'start_date', 'end_date', 'status', 'is_paid'];
}
