<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];


    public function jobs()
    {
        return $this->hasMany(JobOpening::class, "job_type_id", "id");
    }
}
