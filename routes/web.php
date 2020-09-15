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

Auth::routes();

Route::get('/', 'CommentsController@index')->name('comments');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{user}', 'ProfileController@showProfileById')->name('user-profile');
    Route::patch('/disable-profile/{user}', 'ProfileController@disableUser')->name('disable-profile');
    Route::patch('/enable-profile/{user}', 'ProfileController@enableUser')->name('enable-profile');

    Route::post('/add-comment', 'CommentsController@create')->name('add-comment');
    Route::delete('/drop-comment/{comment}', 'CommentsController@destroy')->name('drop-comment');
});
