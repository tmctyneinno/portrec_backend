<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationQualification extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['recruiter_id', 'job_id', 'questions'];

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function  job()
    {
        return $this->belongsTo(JobOpening::class, "job_id", "id");
    }
}
