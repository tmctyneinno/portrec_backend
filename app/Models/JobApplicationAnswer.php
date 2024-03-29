<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicationAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_application_id', 'job_opening_question_id', 'answer', 'deleted_at'];
}
