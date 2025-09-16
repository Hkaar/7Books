<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\LogoutController;


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

Route::group(['namespace' => 'Auth'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('register', [RegisterController::class, 'register'])->name('register');

        Route::get('login', [LoginController::class, 'show'])->name('login.show');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });
});

Route::group(['namespace' => "App\Http\Controllers"], function () {
    Route::get('/', 'HomeController@welcome')->name('/');
    Route::get('browse', 'HomeController@browse')->name('browse');
    Route::get('denied', 'HomeController@denied')->name('denied');

    Route::get('blog', 'ArticleController@index')->name('blog');
    Route::get('blog/{slug}', 'ArticleController@show')->name('blog.show');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('home', 'HomeController@home')->name('home');
        Route::get('me', 'HomeController@me')->name('users.me');
    });
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
});

Route::group(['namespace' => "App\Http\Controllers\Dashboard"], function () {
    Route::get('books/{id}', 'BookController@display')->name('books.display');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('books/{id}/rate', 'BookController@rate')->name('books.rate');
    });

    Route::group(['prefix' => '/manage', 'middleware' => ['auth', 'verify.role']], function () {
        Route::get('books/select', 'BookController@select')->name('books.select');
        Route::get('books/multi-select', 'BookController@multiSelect')->name('books.multi-select');

        Route::get('authors/search/{query}', 'AuthorController@search')->name('authors.search');
        Route::get('genres/search/{query}', 'GenreController@search')->name('genres.search');
        Route::get('libraries/search/{query}', 'LibraryController@search')->name('libraries.search');
        Route::get('regions/search/{query}', 'RegionController@search')->name('regions.search');

        Route::get('authors/authored/{id}', 'AuthorController@authored')->name('authors.authored');
        Route::get('orders/items/{id}', 'OrderController@items')->name('orders.items');

        Route::resource('books', 'BookController')->names('books');
        Route::resource('orders', 'OrderController')->names('orders');
        Route::resource('authors', 'AuthorController')->names('authors');
        Route::resource('genres', 'GenreController')->names('genres');
        Route::resource('libraries', 'LibraryController')->names('libraries');
        Route::resource('regions', 'RegionController')->names('regions');
        Route::resource('articles', 'ArticleController')->names('articles');

        Route::middleware('verify.admin')->group(function () {
            Route::resource('users', 'UserController')->names('users');
        });
    });
});

Route::redirect('manage', '/manage/orders');
