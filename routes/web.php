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

// Main Route
Route::get('/', function() {
    return view('login');
})->name('login');

// Register Routes
Route::get('register','RegisterController@create')->name('register.create');
Route::post('register','RegisterController@store')->name('register.store');
