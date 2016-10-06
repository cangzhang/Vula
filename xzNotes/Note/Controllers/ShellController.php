<?php

namespace xzNotes\Note\Controllers;

use App\Http\Controllers\Controller;

class ShellController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mainPage()
    {
        return view('note::welcome');
    }
}