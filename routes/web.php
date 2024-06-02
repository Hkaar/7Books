<?php

use Illuminate\Support\Facades\Route;

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

Route::group(["namespace" => "App\Http\Controllers"], function() {
    Route::get("/", "HomeController@home")->name("/");
    Route::get("/browse", "HomeController@browse")->name("/browse");
    Route::get("/denied", "HomeController@denied")->name("denied");

    Route::group(["middleware" => ["auth"]], function() {
        Route::get("/logout", "LogoutController@perform")->name("logout");
        Route::get("/me", "HomeController@userShow")->name("user.me");

        Route::post("/books/{id}/rate", "BooksController@rate")->name("books.rate");
    });

    Route::group(["middleware" => ["guest"]], function() {
        Route::get("/register", "RegisterController@show")->name("register.show");
        Route::post("/register", "RegisterController@register")->name("register");

        Route::get("/login", "LoginController@show")->name("login.show");
        Route::post("/login", "LoginController@login")->name("login");
    });

    Route::group(["prefix" => "/manage", "middleware" => ["auth", "check.level"]], function() {
        Route::get("/books/select", "BooksController@select")->name("books.select");
        Route::get("/books/multi-select", "BooksController@multiSelect")->name("books.multi-select");
        
        Route::get("/authors/authored/{id}", "AuthorsController@authored")->name("authors.authored");
        Route::get("/orders/items/{id}", "OrdersController@items")->name("orders.items");
        
        Route::resource("/books", "BooksController")->names("books");
        Route::resource("/orders", "OrdersController")->names("orders");
        Route::resource("/authors", "AuthorsController")->names("authors");
        Route::resource("/genres", "GenreController")->names("genres");
        
        Route::middleware("check.admin")->group(function() {
            Route::get("/users/filter", "UserController@applyFilter")->name("users.filter");
            Route::resource("/users", "UserController")->names("users");
        });
    });
});

Route::redirect("/manage", "/manage/orders");
