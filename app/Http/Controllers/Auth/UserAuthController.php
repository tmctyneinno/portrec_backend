<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserAuthController extends AuthController
{
    public function signup(UserRequest $request)
    {
        $validation = $request->validated();

        $req["name"] = $validation['fullName'];
        $req['email'] = $validation['email'];
        $req['password'] = $validation['password'];

        $create = $this->create($req);
        if (is_string($create) || $create['validation']) {
            $errors = $create['errors'];
            $email = $errors["email"][0] ?? "";
            $phone = $errors["phone"][0] ?? "";

            if ($email == "The email has already been taken." || $phone == "The phone has already been taken.") return $this->errorMessage($create, 409);

            return $this->errorMessage($create);
        }

        return $this->successMessage($create, "success", 201);
    }

    public function signin(Request $request)
    {
        $req['email'] = $request->email;
        $req['password'] = $request->password;

        $login = $this->login($req);
        if (is_string($login) || !$login)
            return $this->errorMessage($login, 401);

        $token = $login->createToken("portrecToken")->plainTextToken;
        return $this->successMessage(["token" => $token], "login success");
    }

    public function changePassword(Request $request)
    {
        
    }
}