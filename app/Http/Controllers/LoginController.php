<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('web.sections.auth.login.index',["title" => "Halaman Login"]);
    }

    public function authenticate(Request $request)
    {
        $credentils = $request->validate([
            "email" => "required|min:3|email:dns",
            "password" => "required"
        ]);


        if (Auth::attempt($credentils)) {


            $request->session()->regenerate();
            return redirect()->intended("/dashboard");

        }


        return back()->with("error", "username or password incorect");
    }


    public function logout(Request  $request)
    {
        Auth::logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }

}
