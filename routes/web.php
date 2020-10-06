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

// Auth
Route::get('login', 'LoginController@form')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::middleware('auth:web')->group(function () {

	// Dashboard
    Route::get('home', 'HomeController@index')->name('home');

    // Data
	Route::prefix('data')->name('data.')->group(function() {
		Route::get('/', 'DataController@index')->name('index');
        Route::match(['post', 'patch'], 'update', 'DataController@post')->name('post');
    });

    // File
	Route::prefix('file')->name('file.')->group(function() {
		Route::get('/', 'FileController@index')->name('index');
		Route::get('download', 'FileController@download')->name('download');
	});
});
