<?php

namespace Vula\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginPage()
    {
        return view('Vula::login');
    }
}
