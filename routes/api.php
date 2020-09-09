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


Route::namespace('Auth')->group(function(){

	Route::post('register', 'RegisterController');
	Route::post('login', 'LoginController');
	Route::post('logout', 'LogoutController');
});

Route::namespace('Article')->middleware('auth:api')->group(function(){

	Route::post('create-new-article', 'ArticleController@store');
	Route::post('article/change-publish-status/{id}', 'ArticleController@changePublishStatus');

});

Route::get('user', 'UserController');
