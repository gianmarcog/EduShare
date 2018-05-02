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

use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/start', 'HomeController@start')->name('start');

Route::get('/bewerten', function () {
    return view('bewerten');
})->name('bewerten');

Route::get('/aktivitaeten', function(){
    return view('aktivitaeten');
})->name('aktivitaeten');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

Route::get('/ranking', 'dbController@ranking')->name('ranking');

Route::get('/', function () {
    return view('welcome');
})->name('uebersicht');

Route::get('search', 'dbController@search')->name('search');

