<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = ['id',];


    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, "recruiter_id", "id");
    }
}
