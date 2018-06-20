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

Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/account', 'UserController@index')->name('account')->middleware('auth');

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

Route::group(['prefix' => 'question', 'middleware' => 'auth'], function () {

    Route::get('post', [
        'as' => 'get_post',
        'uses' => 'ForumController@get_post'
    ]);

    Route::post('post', [
        'as' => 'post_question',
        'uses' => 'ForumController@postQuestion'
    ]);

    Route::delete('post', [
        'as' => 'delete_question',
        'uses' => 'ForumController@deleteQuestion'
    ]);

    Route::post('reply', [
        'as' => 'save_reply',
        'uses' => 'ForumController@saveReply'
    ]);

    Route::delete('reply', [
        'as' => 'delete_reply',
        'uses' => 'ForumController@deleteReply'
    ]);
});
Route::get('/forum/release', 'PagesController@home');

Route::get('/forum/antworten/{id}','AntwortenControllers@show')->name('antworten');


Route::get('admin', ['uses' => 'AdminController@index'])->middleware('admin');
Route::post('admin/updateHS/{id}', ['as' => 'admin/updateHS', 'uses' => 'AdminController@updateHS']);
Route::post('admin/bulk_updateHS', ['as' => 'admin/bulk_updateHS', 'uses' => 'AdminController@bulk_updateHS']);
Route::post('admin/updateAK/{id}', ['as' => 'admin/updateAK', 'uses' => 'AdminController@updateAK']);
Route::post('admin/bulk_updateAK', ['as' => 'admin/bulk_updateAK', 'uses' => 'AdminController@bulk_updateAK']);
Route::post('admin/updateVL/{id}', ['as' => 'admin/updateVL', 'uses' => 'AdminController@updateVL']);
Route::post('admin/bulk_updateVL', ['as' => 'admin/bulk_updateVL', 'uses' => 'AdminController@bulk_updateVL']);
Route::post('admin/updateUS/{id}', ['as' => 'admin/updateUS', 'uses' => 'AdminController@updateUS']);
Route::post('admin/bulk_updateUS', ['as' => 'admin/bulk_updateUS', 'uses' => 'AdminController@bulk_updateUS']);
Route::get('admin/deleteUS/{id}','AdminController@deleteIdUS');
Route::get('admin/deleteHS/{id}','AdminController@deleteIdHS');
Route::get('admin/deleteAK/{id}','AdminController@deleteIdAK');
Route::get('admin/deleteVL/{id}','AdminController@deleteIdVL');
