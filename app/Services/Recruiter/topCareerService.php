<?php 

namespace App\Services\Recruiter;

use App\Models\TopCareer;

class topCareerService 
{

    public function fetchIndustryCareer($industries_id)
    {
        
        $topCareer = TopCareer::query()->where(['industry_id' => $industries_id])->get();
        if($topCareer)return  $topCareer->load('UserProfile', 'User');
        return false;
    }

    public function fetchRandCareer($request)
    {
        $topCareer = TopCareer::with('User')->whereHas('User', function($query) use ($request){
                        $query->where('name', 'LIKE', "%$request->search%")
                        ->orWhere('email', 'LIKE', "%$request->search%")
                        ->wherehas('profile', function($profileSearch) use ($request){
                            $profileSearch->where('preference', 'LIKE', "%$request->search%")
                            ->orWhere('description', 'LIKE', "%$request->search%");
                        })
                        ->wherehas('Skills.skill', function($SkillsSearch) use ($request){
                            $SkillsSearch->where('name', 'LIKE', "%$request->search%");
                        });
             })->get();
      
   if($topCareer) return $topCareer;
        return false;
    }

    

}