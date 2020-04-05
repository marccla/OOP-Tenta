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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Posts
Route::get('/posts', 'PostController@index');

Route::get('/posts/add', 'PostController@create');
Route::post('/posts/add', 'PostController@create');
Route::post('/posts/add', 'PostController@store');

Route::post('/posts', 'PostController@store');  

Route::get('/posts/{id}/', 'PostController@show');
Route::delete('/posts/{id}/', 'PostController@destroy');

Route::get('/posts/edit/{id}', 'PostController@edit');
Route::post('/posts/edit/{id}', 'PostController@edit');
Route::put('/posts/edit/{id}', 'PostController@edit');
Route::put('/posts/edit/{id}', 'PostController@update');

//Categories
// Route::get('/posts/add', 'CatController@create');
// Route::post('/posts/add', 'CatController@create');
// Route::post('/posts/add', 'CatController@store');

