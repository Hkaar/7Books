<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get("/login", [LoginController::class, "show"]);
Route::get("/register", [RegisterController::class, "show"]);
Route::post("/login", [LoginController::class, "authenticate"])->name("login");
Route::post("/register", [RegisterController::class, "register"])->name("register");
