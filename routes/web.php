<?php

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

Route::get('/', function () { return view('index'); })->name('index');

Route::get('/login', function () { return view('login');})->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');

Route::get('/mypage', function () { return view('mypage'); })->name('mypage')->middleware('auth');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->middleware('auth')->name('logout');

Route::get('/shop', function () { return view('shop'); })->name('shop')->middleware('auth');
Route::post('/shop', 'App\Http\Controllers\ShopController@addToCart')->middleware('auth');

Route::get('/bonus', function () { return view('bonus'); })->name('bonus')->middleware('auth');
Route::post('/bonus', 'App\Http\Controllers\UserController@bonus')->middleware('auth');

Route::get('/connect', function () { return view('connect');})->name('connect');

Route::get('/support', function () { return view('support');})->name('support');
Route::post('/support', 'App\Http\Controllers\SupportController@send');

Route::get('/search', function () { return view('search'); })->name('search');
Route::post('/search', 'App\Http\Controllers\UserController@search');

Route::get('/history/login', function () { return view('login_history'); })->name('login_history');
Route::get('/history/money', function () { return view('money_history'); })->name('money_history');
Route::get('/history/crown', function () { return view('crown_records'); })->name('crown_records');

// static pages
Route::get('/join', function () { return view('static/join'); })->name('join');
Route::get('/rule', function () { return view('static/rule'); })->name('rule');
Route::get('/items', function () { return view('static/items'); })->name('items');
Route::get('/prohibited', function () { return view('static/prohibited'); })->name('prohibited');
Route::get('/tos', function () { return view('static/tos'); })->name('tos');
Route::get('/privacy', function () { return view('static/privacy'); })->name('privacy');

// old website pages
Route::get('/{any}.php', function ($any) { return redirect($any); });
