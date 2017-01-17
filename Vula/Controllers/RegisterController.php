<?php

namespace Vula\Controllers;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function regView()
    {
        return view('Vula::register');
    }
}
