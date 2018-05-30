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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bewerten', function () {
    return view('bewerten');
})->name('bewerten')->middleware('auth');

Route::get('/aktivitaeten', 'dbController@aktivitaeten')->name('aktivitaeten');

Route::get('/hochschulen', 'dbController@hochschulen')->name('hochschulen');


Route::get('/forum', function () {
    return view('forum');
})->name('forum')->middleware('auth');

Route::get('/ranking', 'dbController@ranking')->name('ranking');

Route::get('/', function () {
    return view('welcome');
})->name('uebersicht');




Route::get('/hochschule/{id}', 'dbController@informationenHs');

Route::get('/aktivitaet/{id}', 'dbController@informationenAk');

Route::get('/vorlesung/{id}', function () {
    return view('vorlesung');
});

Route::post('/live', 'searchController@livesearch')->name('live');
Route::get('/search', function () {
    return view('searchresults');
})->name('search');