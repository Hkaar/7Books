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

Route::group(['namespace' => "App\Http\Controllers"], function () {
    Route::get('/', 'HomeController@welcome')->name('/');
    Route::get('browse', 'HomeController@browse')->name('browse');
    Route::get('denied', 'HomeController@denied')->name('denied');

    Route::get('blog', 'ArticleController@index')->name('blog');
    Route::get('blog/{slug}', 'ArticleController@show')->name('blog.show');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout', 'LogoutController@perform')->name('logout');

        Route::get('home', 'HomeController@home')->name('home');
        Route::get('me', 'HomeController@me')->name('users.me');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register', 'RegisterController@show')->name('register.show');
        Route::post('register', 'RegisterController@register')->name('register');

        Route::get('login', 'LoginController@show')->name('login.show');
        Route::post('login', 'LoginController@login')->name('login');
    });
});

Route::group(['namespace' => "App\Http\Controllers\Dashboard"], function () {
    Route::get('books/{id}', 'BookController@display')->name('books.display');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('books/{id}/rate', 'BookController@rate')->name('books.rate');
    });

    Route::group(['prefix' => '/manage', 'middleware' => ['auth', 'verify.role']], function () {
        Route::get('books/select', 'BookController@select')->name('books.select');
        Route::get('books/multi-select', 'BookController@multiSelect')->name('books.multi-select');

        Route::get('authors/authored/{id}', 'AuthorController@authored')->name('authors.authored');
        Route::get('orders/items/{id}', 'OrderController@items')->name('orders.items');

        Route::resource('books', 'BookController')->names('books');
        Route::resource('orders', 'OrderController')->names('orders');
        Route::resource('authors', 'AuthorController')->names('authors');
        Route::resource('genres', 'GenreController')->names('genres');
        Route::resource('library', 'LibraryController')->names('libraries');
        Route::resource('region', 'RegionController')->names('regions');
        Route::resource('articles', 'ArticleController')->names('articles');

        Route::middleware('verify.admin')->group(function () {
            Route::resource('users', 'UserController')->names('users');
        });
    });
});

Route::redirect('manage', '/manage/orders');

// TODO! REMOVE THESE AFTER A WEEK
Route::get('articles/kemerdekaan-sebangsa-putih-merah', function () {
    return view('articles.demo');
})->name('articles.demo');

Route::get('articles/keanekaragaman-bangsa-besar', function () {
    return view('articles.demo2');
})->name('articles.demo2');
