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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', function () {
    return \App\User::all();
});

Route::resource('articles', 'Admin\ArticlesController');
Route::post('articles/batch', 'Admin\ArticlesController@batch');

Route::get('/topics', 'TopicsController@index');

Route::get('user/followers/{id}', 'UserFollowsController@index');
Route::post('user/followers', 'UserFollowsController@follow');

Route::get('question/followers/{id}', 'QuestionFollowsController@index');
Route::post('question/followers', 'QuestionFollowsController@follow');

Route::get('answer/followers/{id}', 'AnswerFollowsController@index');
Route::post('answer/followers', 'AnswerFollowsController@follow');
