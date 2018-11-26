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
<<<<<<< Updated upstream
=======
Route::put('user/verify/{token}','EmailVerificationController@index');
Route::put('Member/{id}', 'UserController@update');
>>>>>>> Stashed changes
Route::post('/auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');


Route::group(['middleware' => 'jwt.auth'], function(){
  Route::get('newMember', 'AuthController@getNewMember');
  Route::get('auth/user', 'AuthController@user');
  Route::post('auth/logout', 'AuthController@logout');
});

<<<<<<< Updated upstream
=======

Route::get('Member', 'UserController@getMember');
>>>>>>> Stashed changes
Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::get('auth/refresh', 'AuthController@refresh');
<<<<<<< HEAD
});

Route::resource('news','NewsController',['except'=>['create','edit']]);
Route::resource('comment','CommentController',['except'=>['create','edit']]);
=======
});
>>>>>>> parent of 422042b... Member
