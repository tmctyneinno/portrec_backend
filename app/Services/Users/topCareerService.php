<?php 

namespace App\Services\Users;

use App\Models\TopCareer;

class topCareerService 
{

    public function fetchIndustryCareer($industries_id)
    {
        
        $topCareer = TopCareer::query()->where(['industry_id' => $industries_id])->paginate(20);
        if($topCareer)return  $topCareer;
        return false;
    }

    public function fetchRandCareer()
    {
        $topCareer = TopCareer::inRandomOrder()->paginate(20);
        if($topCareer) return $topCareer;
        return false;
    }

    

}