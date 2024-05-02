<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/account/login", [LoginController::class, "index"])->name("acocount.login");
Route::post("/account/authenticate", [LoginController::class, "authenticate"])->name(("account.authenticate"));
Route::get("/account/dashboard", [DashboardController::class, "index"])->name("account.dashboard");
Route::get("/account/register", [LoginController::class, "register"])->name("account.register");


// logincontroller::class, "method_name"
