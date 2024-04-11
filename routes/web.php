<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenreController;

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

Route::prefix("/login")->group(function() {
    Route::get("", [AuthController::class, "showLogin"]);
    Route::post("", [AuthController::class, "authenticate"])->name("login");
});

Route::prefix("/register")->group(function() {
    Route::get("", [AuthController::class, "showRegister"]);
    Route::post("", [AuthController::class, "register"])->name("register");
});

Route::get("/logout", [AuthController::class, "logout"])->name("logout");

Route::prefix("/manage")->middleware("auth")->group(function() {
    Route::get("/books/select", [BooksController::class, "select"])->name("books.select");
    Route::get("/books/multi-select", [BooksController::class, "multi_select"])->name("books.multi-select");
    
    Route::get("/authors/authored/{id}", [AuthorsController::class, "authored"])->name("authors.authored");

    Route::resource("/users", UserController::class)->names("users");
    Route::resource("/books", BooksController::class)->names("books");
    Route::resource("/orders", OrdersController::class)->names("orders");
    Route::resource("/authors", AuthorsController::class)->names("authors");
    Route::resource("/genres", GenreController::class)->names("genres");
});

Route::redirect("/manage", "/manage/users");

Route::get("/browse", [BooksController::class, "browse"])->name("browse");