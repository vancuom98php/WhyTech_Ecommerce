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
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

Route::get('/dashboard', 'AdminController@show_dashboard')->name('dashboard');

// Google login
Route::get('admin/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('admin.google');
Route::get('admin/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('admin/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('admin.facebook');
Route::get('admin/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Category Product
Route::prefix('category-product')->group(function () {
    Route::get('/create', [
        'as' => 'category-product.create',
        'uses' => 'CategoryProductController@create'
    ]);
    Route::get('/all', [
        'as' => 'category-product.all',
        'uses' => 'CategoryProductController@index'
    ]);
    Route::post('/save', [
        'as' => 'category-product.save',
        'uses' => 'CategoryProductController@store'
    ]);
    Route::get('/inactive/{id}', [
        'as' => 'category-product.inactive',
        'uses' => 'CategoryProductController@inactive'
    ]);
    Route::get('/active/{id}', [
        'as' => 'category-product.active',
        'uses' => 'CategoryProductController@active'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'category-product.edit',
        'uses' => 'CategoryProductController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'category-product.update',
        'uses' => 'CategoryProductController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'category-product.delete',
        'uses' => 'CategoryProductController@delete'
    ]);
});