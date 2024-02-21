<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogsPagesController extends Controller
{

    function login()
    {
        return view('logs.login');
    }

    function logout()
    {
        return view('logs.logout');
    }

    function register()
    {
        return view('logs.register');
    }
}
