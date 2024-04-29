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
    Route::get("", [AuthController::class, "showLogin"])->name("login.show");
    Route::post("", [AuthController::class, "authenticate"])->name("login");
});

Route::prefix("/register")->group(function() {
    Route::get("", [AuthController::class, "showRegister"])->name("register.show");
    Route::post("", [AuthController::class, "register"])->name("register");
});

Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("/denied", [AuthController::class, "denied"])->name("denied");

Route::middleware("auth")->group(function() {
    Route::post("/books/{id}/rate", [BooksController::class, "rate"])->name("books.rate");
    
    Route::get("/me", [AuthController::class, "show"])->name("users.me");
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
