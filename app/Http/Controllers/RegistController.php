<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistController extends Controller
{

    function index()
    {

        return view('web.sections.auth.register.index', ["title" => "Halaman Regist"]);
    }


    function store(Request $request)
    {

        $validate = $request->validate([
            "name" => "required",

            "email" => "required|min:3|email:dns|unique:users,email",
            "password" => "required"
        ]);


//        if(User::where("email",   $validate["email"])->first()){
//            return redirect("/regist")->with("error", "Email Already Registered");
//        }

        $validate["password"] = Hash::make($validate["password"]);

        User::create($validate);

        return redirect()->action([
            LoginController::class,
            'index'
        ]);

    }
}
