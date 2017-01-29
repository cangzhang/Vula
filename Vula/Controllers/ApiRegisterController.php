<?php

namespace Vula\Controllers;

use Vula\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ApiRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function signUp(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        $user = new User();
        $user->updateToken($request['username']);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ApiRegister(Request $request)
    {
        $validator = $this->validator($request->all(), true);

        if ($validator->fails()) {
            return \Response::json($validator);
        }

        $user = $this->create($request->all());
        $this->guard()->login($user);

        $user = new User();
        $user->updateToken($request['username']);
        $response = $user->getUserInfo($request['username'], false);

        return response()->json($response, $response->status);
    }

    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @param bool $throughApi
     * @return mixed
     */
    protected function validator(array $data, $throughApi = false)
    {
        return Validator::make(
            $data,
            $throughApi ? $this->apiRegistrationRules() : $this->registrationRules(),
            $this->validationMsg()
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Registration rules.
     * @return array
     */
    protected function registrationRules()
    {
        return [
            'username' => 'required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:3|confirmed',
        ];
    }

    /**
     * @return array
     */
    protected function apiRegistrationRules()
    {
        return [
            'username' => 'required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:3',
        ];
    }

    /**
     * @return array
     */
    protected function validationMsg()
    {
        return [
            'required' => 'The :attribute field is required.',
            'unique'   => 'The :attribute field is duplicated.',
        ];
    }

}
