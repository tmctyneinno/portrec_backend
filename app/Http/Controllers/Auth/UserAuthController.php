<?php

namespace App\Http\Controllers\Auth;

use App\Events\CreateUserProfile;
use App\Events\RegistrationEmails;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\AcquiredSkill;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAuthController extends AuthController
{
    public function signup(UserRequest $request)
    {
        $validation = $request->validated();

        $req["name"] = $validation['fullName'];
        $req['email'] = $validation['email'];
        $req['password'] = bcrypt($validation['password']);
        $req['role'] = "user";
        $req['phone'] = $validation['phone'];


        if (User::where('email', $validation['email'])->exists()) {

            return response()->json('Email Already Taken', 203);
        }

        if (User::where('phone', $validation['phone'])->exists()) {
            return response()->json('Phone Number Already Taken', 203);
        }

        DB::beginTransaction();
        try {
            $user = User::create($req);
            $user->password = $validation['password'];

            $id = $user->id;


            // #### create user profile #####
            UserProfile::create(array_merge(
                $req,
                [
                    'user_id' => $id,
                    'industries_id' => $request->industry_id ?? null,
                    'about_me' => $request->about_me ?? null,
                    // 'desired_pay' => $request->desired_pay ?? null,
                ]
            ));

            // #### add skills ####
            $skills = [];
            collect($request->skills)
                ->each(function ($sk) use (&$skills, &$id) {
                    $dt =  ["skill_id" => $sk, "user_id" => $id, "created_at" => now(), "updated_at" => now()];
                    array_push($skills, $dt);
                });
            AcquiredSkill::insert($skills);


            // if ($user) {
            // event(new CreateUserProfile($user));
            // event(new RegistrationEmails($validation));
            // }

            $data = [
                'user' => $user,
                $user->profile
            ];
            DB::commit();
            return $this->successMessage($data, "success", 201);
        } catch (\Exception $e) {
            DB::rollBack();
            //  dd($e);
            return $this->errorMessage($e->getMessage(), 409);
        }
    }

    public function signin(Request $request)
    {
        $req['email'] = $request->email;
        $req['password'] = $request->password;

        $login = $this->login($req);
        if (is_string($login) || !$login)
            return $this->errorMessage($login, 401);

        $token = $login->createToken("portrecToken")->plainTextToken;
        return $this->successMessage(["token" => $token, 'user' => $login], "login success");
    }



    public function signinWithGoogle(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'id' => 'required|string', // Google User ID
        ]);

        // Check if the user exists
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => 'user',
                'password' => Hash::make(Str::random((16))),
            ]);

            UserProfile::create([
                'user_id' => $user->id,
                'industries_id' => $request->industry_id ?? null,
            ]);
        }

        $token = $user->createToken("portrecToken")->plainTextToken;

        return $this->successMessage(["token" => $token, 'user' => $user], "login success");
    }

    public function changePassword(Request $request) {}
}
