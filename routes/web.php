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

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('selectteam');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/worldcup/{id}', 'AdminController@worldCupShow');

Route::get('/users/select-captain/{captain_id}', 'HomeController@selectCaptain');

Route::get('/lock-squad', 'HomeController@lockSquad');
Route::get('/admin/match_stages', 'matchStagesController@index')->name('matchStageList');
Route::get('/admin/match_stages/add', 'matchStagesController@create');
Route::get('/admin/match_stages/edit/{match_stage_id}', 'matchStagesController@edit');
Route::match(['put', 'post'],'/admin/match_stages/{match_stage_id}', 'matchStagesController@update');
Route::get('/admin/match_stages/{match_stage_id}', 'matchStagesController@show');
Route::post('/admin/match_stages', 'matchStagesController@save');
Route::get('/users/add-players/{player_id}', 'HomeController@addPlayers');
