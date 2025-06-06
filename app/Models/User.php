<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        "industries_id",
        "allow_search"
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];



    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }


    public function education()
    {
        return $this->hasMany(Education::class, "user_id", "id");
    }

    public function userTransactions()
    {
        return $this->hasMany(UserTransaction::class);
    }

    public function userSubscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function resume()
    {
        return $this->hasMany(UserResume::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }

    public function default_cover_letter()
    {
        return $this->hasOne(CoverLetter::class);
    }

    public function default_resume()
    {
        return $this->hasOne(UserResume::class, 'id', 'resume_id');
    }

    public function cover_letter()
    {
        return $this->hasOne(CoverLetter::class);
    }

    public function experience()
    {
        return $this->hasMany(WorkExperience::class);
    }


    public function portfolios()
    {
        return $this->hasMany(UserPortfolio::class)->with('images');
    }

    public function skill()
    {
        return $this->hasMany(AcquiredSkill::class)->with('Skills');
    }

    public function rating()
    {
        return $this->hasOne(UserRating::class, 'user_id', 'id');
    }

    public function userResume()
    {
        return $this->hasOne(UserResume::class);
    }

    public function isTopCareer()
    {
        return $this->hasOne(TopCareer::class, 'user_id', 'id');
        
    }

    public function userAvatar()
    {
        return $this->hasOneThrough(FileUploadPath::class, UserProfile::class, 'user_id', 'id', 'id', 'avatar');
    }

    
}
