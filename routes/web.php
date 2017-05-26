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

Auth::loginUsingId(2);
Route::get('/', 'ArticleController@index');
Route::get('/articles/{id}', 'ArticleController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vtr', function () {
    return view('web');
})->middleware('auth');

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/{id}', 'QuestionController@show');
