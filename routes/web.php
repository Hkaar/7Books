<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;

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

Route::get("/login", [AuthController::class, "showLogin"]);
Route::post("/login", [AuthController::class, "authenticate"])->name("login");

Route::get("/register", [AuthController::class, "showRegister"]);
Route::post("/register", [AuthController::class, "register"])->name("register");

Route::get("/logout", [AuthController::class, "logout"])->name("logout");

Route::resource("/manage/users", UserController::class)
    ->middleware("auth")
    ->names("users");
    
Route::resource("/manage/books", BooksController::class)
    ->middleware("auth")
    ->names("books");

Route::redirect("/manage", "/manage/users");

Route::get("/browse", [BooksController::class, "browse"])->name("browse");