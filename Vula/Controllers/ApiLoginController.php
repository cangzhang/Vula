<?php

namespace Vula\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
        return $this->login($request);
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'username';
    }

}
