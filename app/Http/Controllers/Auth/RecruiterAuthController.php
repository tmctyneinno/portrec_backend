<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RecruiterAuthController extends AuthController
{
    public function signup(UserRequest $request)
    {
        $validation = $request->validated();

        $req["name"] = $validation['fullName'];
        $req['email'] = $validation['email'];
        $req['password'] = bcrypt($validation['password']);
        // $req['role'] = "recruiter";
        $req['phone'] = $validation['phone'];
        $req['recruiter_level'] = '1';

        if (Recruiter::where('email', $validation['email'])->exists()) {
            return response()->json('Email Already Taken', 203);
        }

        if (Recruiter::where('phone', $validation['phone'])->exists()) {
            return response()->json('Phone Number Already Taken', 203);
        }

        DB::beginTransaction();
        try {
            $recruiter = Recruiter::create($req);
            $recruiter->password = $validation['password'];
            // if ($recruiter) {
            // event(new CreaterecruiterProfile($recruiter));
            // event(new RegistrationEmails($validation));
            // }

            $data = [
                'recruiter' => $recruiter,
                $recruiter->profile
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
        $recruiter = Recruiter::where('email', $request->email)->first();

        if (!$recruiter || !Hash::check($request->password, $recruiter->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $recruiter->createToken('recruiterPortreToken')->plainTextToken;
        return $this->successMessage(["token" => $token, 'recruiter' => $recruiter], "login success");
    }

    // public function updatePassword(Request $request, $id)
    // {

    //     $request->validate([
    //         'current_password' => 'required|string',
    //         'new_password' => 'required|string',
    //     ]);

    //     $model = Recruiter::find($id);

    //     if (!Hash::check($request->current_password, $model->password)) {
    //         return response()->json(['message' => 'Invalid credentials'], 203);
    //     }

    //     $model->password = Hash::make($request->new_password);
    //     $model->save();

    //     return $this->successMessage('Password updated successfully', "success", 200);
    // }


    // public function updateProfile(Request $request, $id)
    // {
    //     $model = Recruiter::findOrFail($id);

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'phone' => 'nullable|string',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $emailExists = Recruiter::where('email', $request->email)->where('id', '!=', $model->id)->exists();
    //     if ($emailExists) {
    //         return response()->json(['message' => 'Email already exists'], 203);
    //     }

    //     $model->name = $request->name;
    //     $model->email = $request->email;
    //     $model->phone = $request->phone;
    //     $model->save();

    //     return response()->json(['message' => 'User information updated successfully'], 200);
    // }
}
