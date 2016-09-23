<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

class ApiAuthController extends Controller
{
    /* register */
    public function register(Request $request)
    {
        $input = $request->all();
//        print_r($input);die();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return response()->json(['result' => true]);
    }

    /* login */
    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['result' => '邮箱或密码错误.']);
        }
        return response()->json(['result' => $token]);
    }

    /* get user info */
    public function getUserDetails(Request $request)
    {
        $input = $request->all();
        $user = JWTAuth::toUser($input['token']);
        return response()->json(['result' => $user]);
    }

}