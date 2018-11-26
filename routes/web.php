<?php

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
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('mail/send', 'SendVerificationController@send');
Route::get('/{any}', 'SpaController@index')->where('any', '.*');
Route::get('/berita', function () {
    return view('pages/berita');
});


// Route::resource('News','NewsController');

Route::get('/home', 'HomeController@index')->name('home');
