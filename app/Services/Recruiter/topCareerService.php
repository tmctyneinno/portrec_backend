<?php 

namespace App\Services\Recruiter;

use App\Models\TopCareer;

class topCareerService 
{

    public function fetchIndustryCareer($industries_id)
    {
        
        $topCareer = TopCareer::with(['User','User.userAvatar'])->where(['industry_id' => $industries_id])->inRandomOrder()->get();
        if($topCareer)return  $topCareer;
        return false;
    }

    public function fetchRandCareer($request)
    {
        $topCareer = TopCareer::with(['User','User.userAvatar'])->whereHas('User', function($query) use ($request){
                        $query->where('name', 'LIKE', "%$request->search%")
                        ->orWhere('email', 'LIKE', "%$request->search%")
                        ->orWherehas('profile', function($profileSearch) use ($request){
                            $profileSearch->where('preference', 'LIKE', "%$request->search%")
                            ->orWhere('description', 'LIKE', "%$request->search%");
                        })->orWherehas('skill.Skills', function($SkillsSearch) use ($request){
                          $SkillsSearch->where('name', 'LIKE', "%$request->search%");
                        });
                       
             })->inRandomOrder()->get();
             
      
   if($topCareer) return $topCareer;
        return false;
    }

    

}