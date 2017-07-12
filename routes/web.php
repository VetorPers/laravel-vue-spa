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

//Auth::logout(2);

Route::get('/test', function () {
    Auth::user()->isQuestionFollows();
});
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'ArticlesController@index');
Route::get('/articles/{id}', 'ArticlesController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vtr', function () {
    return view('web');
})->middleware('auth');

Route::resource('/questions', 'QuestionsController');

Route::post('/questions/{id}/answer', 'AnswersController@answer');

Route::resource('/messages', 'MessageController');

Route::get('/notifications', 'NotificationController@index');

Route::post('/comments', 'CommentsController@store');
