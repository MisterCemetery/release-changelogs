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

Route::get('/changelogs', 'ChangelogController@index');
Route::get('/changelogs/create', 'ChangelogController@create');
Route::post('/changelogs', 'ChangelogController@save');
Route::post('/changelogs/{changelog}/edit', 'ChangelogController@edit');
Route::patch('/changelogs/{changelog}', 'ChangelogController@update');
Route::delete('/changelogs/{changelog}', 'ChangelogController@delete');