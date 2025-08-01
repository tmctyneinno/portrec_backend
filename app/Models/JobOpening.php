<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;
    protected $fillable = [
        'recruiter_id',
        'company_id',
        'job_level_id',
        'industry_id',
        'country_id',
        'job_function_id',
        'job_type_id',
        'title',
        'description',
        'required_skills',
        'min_salary',
        'max_salary',
        'deadline',
        'qualifications',
        'location',
        'experience',
        'total_view',
        'other_qualifications',
        'benefits',
        'status',
        'responsibilities',
        'capacity',
        'total_applied',
        'job_url',
        'job_email',
        'is_featured',
        'currency_id'
    ];

    // protected $hidden = [
    //     "recruiter_id",
    //     "company_id",
    //     "job_type_id",
    //     "job_functions"
    // ];

    public function jobType()
    {
        return $this->belongsTo(JobType::class, "job_type_id", "id");
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function level()
    {
        return $this->belongsTo(JobLevel::class, "job_level_id", "id");
    }

    public function industry()
    {

        return $this->belongsTo(Industry::class);
    }

    public function jobFunctions()
    {
        return $this->belongsTo(JobFunction::class, "job_function_id", "id");
    }

    public function questions()
    {
        return $this->hasMany(JobOpeningQuestion::class, 'job_opening_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(CountryCurrency::class, 'currency_id', 'id');
    }
}
