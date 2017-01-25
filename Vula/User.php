<?php

namespace Vula;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $username
     * @return mixed
     */
    public function getUserInfo($username)
    {
        $userInfo = User::where('username', $username)->first();
        $userInfo->token = $userInfo->remember_token;
        $userInfo->status = 200;

        return $userInfo;
    }

    /**
     * @param $username
     */
    public function updateToken($username)
    {
        $user = User::where('username', $username)->first();
        $user->remember_token = $this->generateToken();
        $user->save();
    }

    public function generateToken()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        for ($i = 0; $i < 60; $i++) {
            $string .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $string;
    }

}
