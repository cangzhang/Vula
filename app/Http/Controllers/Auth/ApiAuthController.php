<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

class ApiAuthController extends Controller
{
    /* register */
    public function register(Request $request)
    {
        $errors = new \stdClass();
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if (User::where('email', '=', Input::get('email'))->exists()) {
            $errors->message = 'Email address has been registered!';
            return response()->json(['errors' => $errors, 'status' => 400], 400);
        } else if (User::where('username', '=', Input::get('username'))->exists()) {
            $errors->message = 'Username has been registered!';
            return response()->json(['errors' => $errors, 'status' => 400], 400);
        }
        else {
            User::create($input);
            return response()->json(['created' => true, 'status' => 201], 201);
        }
    }

    /* login */
    public function login(Request $request)
    {
        $errors = new \stdClass();
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            $errors->message = 'Wrong username or password.';
            return response()->json(['errors' => $errors], 401);
        }
        return response()->json(['token' => $token, 'status' => 200], 200);
    }

    /* get user info */
    public function getUserDetails()
    {
        $user = JWTAuth::authenticate(JWTAuth::getToken());
        return response()->json(['User' => $user, 'status' => 200], 200);
    }

}