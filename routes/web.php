<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('/auth/login');
});
Route::get('/loginFailed', function () {
    return view('/auth/loginFailed');
});
Route::get('/register', function () {
    return view('/auth/register');
});
Route::get('/bookListing', function () {
    return view('bookListing');
});
Route::get('/landingPage', function () {
    return view('/customer/landingPage');
});
Route::get('/moreInfo', function () {
    return view('/moreInfo');
});
Route::get('/customerMoreInfo', function () {
    return view('/customer/customerMoreInfo');
});
Route::get('/errorPage', function () {
    return view('/customer/errorPage');
});
Route::post('/customerDetail', 'App\Http\Controllers\BookController@customerDetail');
Route::post('/moreInfo', 'App\Http\Controllers\BookController@moreInfo');
Route::post('/checkout', 'App\Http\Controllers\CartController@checkout');
Route::post('/checkIn', 'App\Http\Controllers\BookController@bookReturn');
Route::post('/addCart', 'App\Http\Controllers\CartController@addCart');
Route::post('/deleteCart', 'App\Http\Controllers\CartController@deleteCart');
Route::post('/registerUser', 'App\Http\Controllers\UserController@registerUser');
Route::post('/validate', 'App\Http\Controllers\UserController@login');
Route::post('/toLandingPage', 'App\Http\Controllers\UserController@toLandingPage');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



