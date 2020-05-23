<?php

use Illuminate\Support\Facades\Route;

/*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    |
    |
    |
*/
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('post.login');
Route::post('/logout', 'AuthController@logout')->name('logout');

// refer to contact us page
Route::get('/', 'HomeController@getContactUs')->name('contact.us');
Route::post('/send/email', 'HomeController@sendEmail')->name('send.email');

Route::middleware('auth')->group(function(){
    Route::get('/admin/home', 'adminController@adminHome')->name('admin.home');
    Route::get('/delete/message/{id}', 'adminController@delete')->name('delete.msg');
    Route::get('/done/delete/message/{id}', 'adminController@delete')->name('done.delete.msg');
    Route::get('/logout', 'AuthController@logout')->name('logout');

});
