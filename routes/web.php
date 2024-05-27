<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;
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

Route::group(["namespace" => "App\Http\Controllers"], function() {
    Route::group(["middleware" => ["guest"]], function() {
        Route::get("/register", "RegisterController@show")->name("register.show");
        Route::post("/register", "RegisterController@register")->name("register");

        Route::get("/login", "LoginController@show")->name("login.show");
        Route::post("/login", "LoginController@login")->name("login");
    });

    Route::group(["middleware" => ["auth"]], function() {
        Route::get("/logout", "LogoutController@perform")->name("logout");
    });
});

Route::get("/denied", function() {
    return view("auth.denied");
})->name("denied");

Route::middleware("auth")->group(function() {
    Route::post("/books/{id}/rate", [BooksController::class, "rate"])->name("books.rate");
});

Route::prefix("/manage")->middleware(["auth", "check.level"])->group(function() {
    Route::get("/books/select", [BooksController::class, "select"])->name("books.select");
    Route::get("/books/multi-select", [BooksController::class, "multiSelect"])->name("books.multi-select");
    
    Route::get("/authors/authored/{id}", [AuthorsController::class, "authored"])->name("authors.authored");
    Route::get("/orders/items/{id}", [OrdersController::class, "items"])->name("orders.items");
    
    Route::resource("/books", BooksController::class)->names("books");
    Route::resource("/orders", OrdersController::class)->names("orders");
    Route::resource("/authors", AuthorsController::class)->names("authors");
    Route::resource("/genres", GenreController::class)->names("genres");
    
    Route::middleware("check.admin")->group(function() {
        Route::resource("/users", UserController::class)->names("users");
    });
});

Route::redirect("/manage", "/manage/orders");
Route::get("/browse", [BooksController::class, "browse"])->name("browse");
