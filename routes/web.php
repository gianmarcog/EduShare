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

Route::get('/', function () {
    return view('welcome');
})->name('uebersicht');

Route::get('/account', 'UserController@index')->name('account');

Route::get('/account/delete','UserController@delete')->name('deleteAccount');

Route::get('/account/bearbeiten', 'UserController@edit')->name('bearbeiten');

Route::post('/account/bearbeiten', 'UserController@update')->name('bearbeiten');

Route::post('/account', 'UserController@update_avatar');

Route::get('/bewerten', 'BewertenController@showAll')->middleware('auth')->name('bewerten');

Route::post('/bewerten', 'BewertenController@store');

Route::get('/aktivitaeten', 'DbController@aktivitaeten')->name('aktivitaeten');

Route::get('/aktivitaet/{id}', 'DbController@informationenAk');

Route::get('/ranking', 'DbController@ranking')->name('ranking');

Route::get('/hochschulen', 'DbController@hochschulen')->name('hochschulen');

Route::get('/hochschule/{id}', 'DbController@informationenHs');

Route::get('/vorlesung/{id}', function () {
    return view('vorlesung');
});

Route::post('/live', 'SearchController@livesearch')->name('live');

Route::get('/search', function () {
    return view('searchresults');
})->name('search');

Route::group(['prefix' => 'question'], function () {

    Route::get('post', [
        'as' => 'get_post',
        'uses' => 'ForumController@get_post'
    ]);

    Route::post('post', [
        'as' => 'post_question',
        'uses' => 'ForumController@postQuestion'
    ]);
});
Route::get('/forum/release', 'PagesController@home');

Route::get('/forum/antworten/{id}','AntwortenControllers@show')->name('antworten');


Route::get('admin', ['uses' => 'AdminController@index']);
Route::post('admin/updateHS/{id}', ['as' => 'admin/updateHS', 'uses' => 'AdminController@updateHS']);
Route::post('admin/bulk_updateHS', ['as' => 'admin/bulk_updateHS', 'uses' => 'AdminController@bulk_updateHS']);
Route::post('admin/updateAK/{id}', ['as' => 'admin/updateAK', 'uses' => 'AdminController@updateAK']);
Route::post('admin/bulk_updateAK', ['as' => 'admin/bulk_updateAK', 'uses' => 'AdminController@bulk_updateAK']);
Route::post('admin/updateVL/{id}', ['as' => 'admin/updateVL', 'uses' => 'AdminController@updateVL']);
Route::post('admin/bulk_updateVL', ['as' => 'admin/bulk_updateVL', 'uses' => 'AdminController@bulk_updateVL']);
