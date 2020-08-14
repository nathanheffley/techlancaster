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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::resource('meetups', 'MeetupController')->except([
        'index',
        'show',
    ]);
});
