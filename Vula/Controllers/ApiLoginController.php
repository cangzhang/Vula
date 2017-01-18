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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function ApiLogin(Request $request)
    {
        if ($request->isJson() || $request->ajax()) {
            $credentials = [];
            $credentials['username'] = $request->json('username');
            $credentials['password'] = $request->json('password');

            $this->validate($request, [
                $this->username() => 'required',
                'password'        => 'required',
            ]);

            if (\Auth::attempt($credentials)) {
                //TODO
            }
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }


            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'username';
    }

}
