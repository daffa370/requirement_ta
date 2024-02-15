<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {


        return view("web.sections.dashboard.index",[
            "title" => "Dashboard"
        ]);
    }
}
