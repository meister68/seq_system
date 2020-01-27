<?php
use App\Events\CommentEvent;
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

Route::get('test','Post\CommentController@notify');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ask','HomeController@ask')->name('ask');

Route::prefix('post')->group( function() {
    Route::get('/', 'User\PostController@addPost');
    Route::get('/edit/{id}', 'User\PostController@editPost');
    Route::get('update/{id}', 'User\PostController@update');
    Route::get('delete/{id}', 'User\PostController@removePost');
   
});


