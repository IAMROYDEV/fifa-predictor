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

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/worldcup/{id}', 'AdminController@worldCupShow');
    
    Route::get('/admin/users', 'AdminController@admin_index')->name('admin.users.list');
    Route::match(['put', 'post'], '/admin/users/{user_id}', 'AdminController@admin_update')->name('admin.users.update');

    Route::get('/admin/global-settings', 'GlobalSettingsController@index')->name('admin.globalSettingsList');
    Route::post('/admin/global-settings', 'GlobalSettingsController@store');
    Route::match(['put', 'post'], '/admin/global-settings/{global_settings_id}', 'GlobalSettingsController@update');

    Route::get('/admin/match-stages', 'matchStagesController@index')->name('matchStageList');
    Route::get('/admin/match-stages/add', 'matchStagesController@create');
    Route::get('/admin/match-stages/edit/{match_stage_id}', 'matchStagesController@edit');
    Route::match(['put', 'post'], '/admin/match-stages/{match_stage_id}', 'matchStagesController@update');
    Route::get('/admin/match-stages/{match_stage_id}', 'matchStagesController@show');
    Route::post('/admin/match-stages', 'matchStagesController@save');
});

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('selectteam');

Route::get('/dashboard', 'UserDashboardController@index')->name('user.dashboard');
Route::post('/favourite', 'FavouriteController@save')->name('user.favourite');

Route::get('/users/select-captain/{captain_id}', 'HomeController@selectCaptain');

Route::get('/lock-squad', 'HomeController@lockSquad');

Route::get('/users/add-players/{player_id}', 'HomeController@addPlayers');
Route::get('match/prediction/{world_cup_id}', 'MatchController@index')->name('matchPredictions');
Route::post('match/prediction/set', 'MatchController@setUserMatchPrediction');

