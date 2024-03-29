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
Route::get('/add-job', 'JobController@addJob')->name('add-job');
Route::get('/publish-job', 'JobController@publishJob')->name('publish-job');
Route::get('/publish/{jobId}', 'JobController@publish')->name('publish');
Route::post('/add-job', 'JobController@storeJob')->name('store-job');
