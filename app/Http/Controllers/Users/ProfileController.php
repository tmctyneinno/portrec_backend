<?php

namespace App\Http\Controllers\Users;

use App\Helper\FileUpload;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Users\Trait\UserTrait;
use App\Models\ProfilePicture;
use App\Models\Skill;
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
            // Create a new UserProfile if it doesn't exist
            $data['user_id'] = $id;
            UserProfile::create($data);
        }

        $user->update($request->all());

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



    public function uploadProfileImage(Request $request, $id = "")
    {
        $userId = $this->userID()->id;

        $resp = FileUpload::uploadFile($request->file("img"), "profile_pic");

        // if ($resp instanceof Response) return $resp;

        // if (!$id) {
        //     $upload = ProfilePicture::create(["user_id" => $userId, "image" => $resp]);
        //     return $this->successMessage($upload);
        // }

        // ProfilePicture::where($this->condition($id, $userId))->update(["image" => $resp]);
        return $this->successMessage($resp);
    }
}
