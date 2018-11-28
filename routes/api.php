<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Setting;
use App\Http\Resources\setting as SettingResource;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/setting', function () {
    return new SettingResource(Setting::find(1));
});

Route::put('user/verify/{token}','EmailVerificationController@index');
Route::put('Member/{id}', 'UserController@update');
Route::post('/auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');


Route::group(['middleware' => 'jwt.auth'], function(){
  Route::put('user/accept/{id}', 'UserController@accept');
  Route::delete('user/{id}', 'UserController@delete');
  
  Route::get('newMember', 'AuthController@getNewMember');
  Route::get('auth/user', 'AuthController@user');
  Route::post('auth/logout', 'AuthController@logout');
});


Route::get('Member/{nItem}', 'UserController@getMember');
Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::get('auth/refresh', 'AuthController@refresh');
});

Route::resource('news','NewsController',['except'=>['create','edit']]);
Route::resource('comment','CommentController',['except'=>['create','edit','index']]);
