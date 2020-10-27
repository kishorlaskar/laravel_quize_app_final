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

Route::resource('question','QuestionController');
Route::get('/question/start-quiz', 'QuestionController@start_quiz')->name('question.start-quiz');

Route::get('/quiz','MainController@index')->name('quiz');
Route::any('start-quiz','MainController@startquiz')->name('start-quiz');
Route::any('submit-ans','MainController@submitans')->name('submit-ans');
