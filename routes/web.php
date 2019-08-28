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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/genre', 'PagesController@getGenre');

Route::get('/movies/{genre?}/{pageno?}', 'PagesController@getMovieList');

Route::get('/moviedetail/{movieid}', 'PagesController@getMovieDetail');

Route::get('/searchmovies/{query?}/{pageno?}', 'PagesController@searchMovie');
