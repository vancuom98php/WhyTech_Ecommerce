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

Route::group([
    'prefix' => 'home'
], function () {
    // Home
    Route::get('', 'HomeController@index');

    //Home - Category 
    Route::get('/category/{id}', [
        'as' => 'home.category',
        'uses' => 'CategoryProductController@show_category_home'
    ]);

    // Home - Brand
    Route::get('/brand/{id}', [
        'as' => 'home.brand',
        'uses' => 'BrandController@show_brand_home'
    ]);

    // Home - Product detail
    Route::get('/product-detail/{id}', [
        'as' => 'product.detail',
        'uses' => 'ProductController@show_details_product'
    ]);
});

// Cart
Route::group([
    'prefix' => 'cart'
], function() {
    // Add Cart
    Route::post('/add', [
        'as' => 'cart.add',
        'uses' => 'CartController@store'
    ]);
    Route::get('/show', [
        'as' => 'cart.show',
        'uses' => 'CartController@show'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'cart.delete',
        'uses' => 'CartController@delete'
    ]);
    Route::post('/update-quantity', [
        'as' => 'cart.update-quantity',
        'uses' => 'CartController@update_quantity'
    ]);
});

// Checkout
Route::group([
    'prefix' => 'checkout'
], function() { 
    // Login Checkout
    Route::get('/login-checkout', [
        'as' => 'checkout.login-checkout',
        'uses' => 'CheckoutController@login_to_checkout'
    ]);
});

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
Route::group([
    'prefix' => 'category-product',
    'middleware' => 'auth'
], function () {
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

// Brands
Route::group([
    'prefix' => 'brand',
    'middleware' => 'auth'
], function () {
    Route::get('/create', [
        'as' => 'brand.create',
        'uses' => 'BrandController@create'
    ]);
    Route::get('/all', [
        'as' => 'brand.all',
        'uses' => 'BrandController@index'
    ]);
    Route::post('/save', [
        'as' => 'brand.save',
        'uses' => 'BrandController@store'
    ]);
    Route::get('/inactive/{id}', [
        'as' => 'brand.inactive',
        'uses' => 'BrandController@inactive'
    ]);
    Route::get('/active/{id}', [
        'as' => 'brand.active',
        'uses' => 'BrandController@active'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'brand.edit',
        'uses' => 'BrandController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'brand.update',
        'uses' => 'BrandController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'brand.delete',
        'uses' => 'BrandController@delete'
    ]);
});

// Products
Route::group([
    'prefix' => 'product',
    'middleware' => 'auth'
], function () {
    Route::get('/create', [
        'as' => 'product.create',
        'uses' => 'ProductController@create'
    ]);
    Route::get('/all', [
        'as' => 'product.all',
        'uses' => 'ProductController@index'
    ]);
    Route::post('/save', [
        'as' => 'product.save',
        'uses' => 'ProductController@store'
    ]);
    Route::get('/inactive/{id}', [
        'as' => 'product.inactive',
        'uses' => 'ProductController@inactive'
    ]);
    Route::get('/active/{id}', [
        'as' => 'product.active',
        'uses' => 'ProductController@active'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'product.edit',
        'uses' => 'ProductController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'product.delete',
        'uses' => 'ProductController@delete'
    ]);
});