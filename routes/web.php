<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExtraCuricularController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect("/login");
});


Route::get('/home', function () {
    return view('web.sections.static.home', [
        "title" => "Halaman Home"
    ]);
});


Route::resource('/student', StudentsController::class);
Route::resource('/kelas', \App\Http\Controllers\KelasController::class);
Route::resource('/ekstrakurikuller', \App\Http\Controllers\ExtraCuricularController::class);

Route::get('/detail/{student}', function (Student $student) {
    return view('student.detail', [
        "title" => "Student Detail",
        "student" => $student
    ]);
});

Route::middleware("guest")->group(function () {

    Route::post('/regist', [RegistController::class, "store"]);
    Route::get('/regist', [RegistController::class, "index"]);

    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/login', [LoginController::class, 'index'])->name("login");
});


Route::middleware("auth")->group(function () {


    Route::post('/logout', [LoginController::class, "logout"]);
    Route::get('/dashboard', [DashboardController::class, "index"]);

    Route::get('/about', function () {
        return view('web.sections.static.about', [
            "title" => "Halaman About",
            "nama" => \Illuminate\Support\Facades\Auth::user()->name,
            "kelas" => "11 PPLG 1",
            "image" => "sedekah.png"
        ]);
    });


    Route::resource('dashboard/student', StudentsController::class);
    Route::resource('dashboard/kelas', \App\Http\Controllers\KelasController::class);
    Route::resource('dashboard/ekstrakurikuller', ExtraCuricularController::class);


//    Route::get('/dashboard/ekstrakurikuller/{extraCuricular}/edit', [ExtraCuricularController::class,'edit']);



    Route::resource('dashboard/user', UserController::class)->middleware("admin");


});
