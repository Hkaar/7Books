<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("/");

Route::resource("orders", OrdersController::class)->names("orders");

Route::get("/login", [AuthController::class, "showLogin"]);
Route::get("/register", [AuthController::class, "showRegister"]);
Route::post("/login", [AuthController::class, "authenticate"])->name("login");
Route::post("/register", [AuthController::class, "register"])->name("register");

Route::get("/dashboard", [AuthController::class, "dashboard"])->middleware("auth")->name("dashboard");
