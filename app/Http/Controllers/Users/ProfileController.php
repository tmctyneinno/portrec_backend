<?php

namespace App\Http\Controllers\Users;

use App\Helper\FileUpload;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Users\Trait\UserTrait;
use App\Models\FileUploadPath;
use App\Models\Skill;
use App\Models\TopCareer;
use App\Models\User;
use App\Services\Users\CloudinaryFileUploadService;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    use UserTrait;
    public function myProfile()
    {
        $user = $this->UserID();
        $associations = ["experience", "cover_letter", "resume", "education", "profile", "portfolios"];
        $profile = User::with($associations)->find($user->id);
        $profile['skills'] = $profile->skill->each(function ($data) {
            $data["name"] = Skill::find($data['skill_id'])->name;
        });

        // $avatar = FileUploadPath::find($profile->profile->avatar);
        $profile['avatar'] = $profile->userAvatar;

        return $this->successMessage($profile, "profile updated", 201);
    }

    public function updateProfile(Request $request)
    {
        $id = $this->userID()->id;
        $user = User::where("id", $id)->first();
        if ($request->image_path) {
            $fileUplaod = new CloudinaryFileUploadService;
            $upload = $fileUplaod->upload($request->image_path, 'profile');
        }

        $data = $this->UserDetails($request, $upload[1] ?? null);
        $profile = UserProfile::whereUserId($id)->first();


        if ($profile) {
            $profile->fill($data)->save();
        } else {
            $data['user_id'] = $id;
            UserProfile::create($data);
        }
        $user->update($request->all());

         $talent = TopCareer::where('user_id', $user->id)->exists();
        if(!$talent)
        {
        $ss =  TopCareer::create([
                'user_id' => $user->id,
                'industry_id'  => $profile->industries_id??1
            ]);
            return $this->successMessage(['user' => $ss,], "profile updated", 201);
        }
      
        return $this->successMessage(['user' => $user, 'profile' => $user->profile], "profile updated", 201);
    }


    public function updatePassword(Request $request)
    {
        $userId = $this->userID()->id;
        $user = User::find($userId)->first();
        $oldPassword = Hash::check($request->oldPassword, $user->password);
        if (!$oldPassword) {
            return $this->errorMessage("wrong old password");
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return $this->successMessage("", "password update success");
    }



    public function uploadProfileImage(Request $request)
    {
        $userId = $this->userID()->id;
        $folder_path = 'profile_pics';

        $profile = UserProfile::where('user_id', $userId)->first();

        // delete existing photo
        if ($profile->avatar) {
            $profilePic = $profile->FileUploadPath;
            FileUpload::deleteFileInPath($profilePic->folder_path, $profilePic->name);
        }

        // upload the new file and URL
        $fileUploaded = FileUpload::uploadFileToPath($request, 'img', $folder_path);
        $FileUploadPath = FileUploadPath::updateOrCreate(
            ['id' => $profile->avatar],
            [
                'name' => $fileUploaded['name'],
                'folder_path' => $folder_path,
                'url' => $fileUploaded['url'],
            ]
        );

        // update avatar
        $profile->update(["avatar" => $FileUploadPath->id]);

        return $this->successMessage($fileUploaded);
    }
}
