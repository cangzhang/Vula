<?php

namespace xzNotes\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function loginPage() {
        return view('auth::login');
    }
}