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

Route::get('test/','User\CommentController@notify');
Route::get('notif', function () {
    return view('Notification');
});
// // Route::get('/test2', function () {
// //     return 'test';
// // });

 Route::any('/comment1', 'User\CommentController@addComment');

 Route::get('/content/{id}','HomeController@seeBody')->name('seeBody');
 Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/ask','HomeController@ask')->name('ask');
Route::get('/search', 'SearchController@search')->name('search');

Route::get('/content/{id}','HomeController@seeBody')->name('seeBody');

Route::prefix('post')->group( function() {
    Route::post('/', 'User\PostController@addPost')->name('addPost');
    Route::get('/edit/{id}', 'User\PostController@editPost')->name('editPost');
    Route::post('update/{id}', 'User\PostController@updatePost')->name('updatePost');
    Route::get('delete/{id}', 'User\PostController@removePost')->name('deletePost');
});

Route::prefix('comment')->group( function() {
    Route::any('/', 'User\CommentController@addComment')->name('addComment');
    Route::get('/edit/{id}', 'User\CommentController@editComment')->name('edit');
    Route::get('update/{id}', 'User\CommentController@update')->name('update');
    Route::get('delete/{id}', 'User\CommentController@removeComment')->name('deleteComment');
});


