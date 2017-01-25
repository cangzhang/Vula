<?php

namespace Vula\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Vula\User;

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
            $credentials = [
                'username' => $request->json('username'),
                'password' => $request->json('password')
            ];

            $this->validate($request, [
                $this->username() => 'required',
                'password'        => 'required',
            ]);

            if (\Auth::attempt($credentials, $request->has('remember'))) {
                $user = new User();
                $user->updateToken($credentials['username']);
                $response = $user->getUserInfo($credentials['username']);

                return response()->json($response, $response->status);
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

    function loginResponse($credentials)
    {
        $user = new User();
        $userInfo = $user->where('username', $credentials['username'])->first();

    }

}
