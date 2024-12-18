<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'recruiter_id', 'job_application_id', 'assigned_to', 'interview_channel_id', 'location', 'interview_date', 'status', 'description', 'team_members', 'password', 'meeting_id', 'join_url', 'host_url', 'message', 'candidate_approved'];

    protected $cast = 
    [
        'candidate_approved' => 'nullable'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getRecruiter()
    {
        return $this->belongsTo(Recruiter::class, 'recruiter_id', 'id');
    }

    public function getJobs()
    {
        return $this->belongsTo(JobApplication::class, 'job_application_id','id',)->with('job');
    }

    public function company()
    {
        return $this->hasOneThrough(Company::class, RecruiterProfile::class, 'recruiter_id', 'id', 'recruiter_id','company_id');
    }
}

