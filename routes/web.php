<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// Admin
Auth::routes();

Route::get('/dashboard', 'AdminController@show_dashboard')->name('dashboard');

// Google login
Route::get('admin/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('admin.google');
Route::get('admin/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('admin/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('admin.facebook');
Route::get('admin/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);