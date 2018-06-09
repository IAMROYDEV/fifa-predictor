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

    Route::get('/admin/global_settings', 'GlobalSettingsController@index')->name('admin.globalSettingsList');
    Route::post('/admin/global_settings', 'GlobalSettingsController@store');
    Route::match(['put', 'post'], '/admin/global_settings/{global_settings_id}', 'GlobalSettingsController@update');

    Route::get('/admin/match_stages', 'matchStagesController@index')->name('matchStageList');
    Route::get('/admin/match_stages/add', 'matchStagesController@create');
    Route::get('/admin/match_stages/edit/{match_stage_id}', 'matchStagesController@edit');
    Route::match(['put', 'post'], '/admin/match_stages/{match_stage_id}', 'matchStagesController@update');
    Route::get('/admin/match_stages/{match_stage_id}', 'matchStagesController@show');
    Route::post('/admin/match_stages', 'matchStagesController@save');
    Route::get('/admin/list_matches', 'MatchController@listMatches')->name('listmatches');
    Route::post('/admin/add_matches', 'MatchController@addMatches')->name('addmatches');
    Route::get('/admin/edit_match/{match_id}', 'MatchController@editMatch')->name('editmatch');
    Route::post('/admin/update_match/{match_id}', 'MatchController@updateMatch')->name('updatematch');
    Route::get('/admin/delete_match/{match_id}', 'MatchController@deleteMatch')->name('deletematch');
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

