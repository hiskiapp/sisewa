<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Auth
Route::get('login', 'LoginController@form')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::middleware('auth:admin')->group(function () {

	// Dashboard
	Route::get('home', 'HomeController@index')->name('home');

	// Master Admin
    Route::resource('admins', 'AdminController');

    // Master User
    Route::resource('users', 'UserController');

    // User Data
	Route::prefix('users')->name('users.')->group(function() {
        Route::match(['post', 'patch'], 'data/{id}', 'UserController@data')->name('data');
	});
});
