<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function indexLogin()
    {
        return view("auth.login.index");
    }
}
