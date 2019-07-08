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

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', 'google');

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', 'google');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {

    //Роуты для управление пользователем.
    Route::get('/', ['uses' => 'AdminController@index']);
    Route::get('/users', ['uses' => 'UsersController@index']);
    Route::get('/users/create', ['uses' => 'UsersController@create']);
    Route::post('/users', ['uses' => 'UsersController@store']);
    Route::get('/users/{id}', ['uses' => 'UsersController@show']);
    Route::get('/users/{id}/edit', ['uses' => 'UsersController@edit']);
    Route::patch('/users/{id}', ['uses' => 'UsersController@update']);
    Route::delete('/users/{id}', ['uses' => 'UsersController@destroy']);



    Route::get('/roles', ['uses' => 'rolesController@index']);
    Route::get('/roles/create', ['uses' => 'rolesController@create']);
    Route::post('/roles', ['uses' => 'rolesController@store']);
    Route::get('/roles/{id}', ['uses' => 'rolesController@show']);
    Route::get('/roles/{id}/edit', ['uses' => 'rolesController@edit']);
    Route::patch('/roles/{id}', ['uses' => 'rolesController@update']);
    Route::delete('/roles/{id}', ['uses' => 'rolesController@destroy']);


    Route::get('/permissions', ['uses' => 'permissionsController@index']);
    Route::get('/permissions/create', ['uses' => 'permissionsController@create']);
    Route::post('/permissions', ['uses' => 'permissionsController@store']);
    Route::get('/permissions/{id}', ['uses' => 'permissionsController@show']);
    Route::get('/permissions/{id}/edit', ['uses' => 'permissionsController@edit']);
    Route::patch('/permissions/{id}', ['uses' => 'permissionsController@update']);
    Route::delete('/permissions/{id}', ['uses' => 'permissionsController@destroy']);


    Route::get('/pages', ['uses' => 'pagesController@index']);
    Route::get('/pages/create', ['uses' => 'pagesController@create']);
    Route::post('/pages', ['uses' => 'pagesController@store']);
    Route::get('/pages/{id}', ['uses' => 'pagesController@show']);
    Route::get('/pages/{id}/edit', ['uses' => 'pagesController@edit']);
    Route::patch('/pages/{id}', ['uses' => 'pagesController@update']);
    Route::delete('/pages/{id}', ['uses' => 'pagesController@destroy']);


    Route::get('/activitylogs', ['uses' => 'activitylogsController@index']);
    Route::get('/activitylogs/{id}', ['uses' => 'activitylogsController@show']);
    Route::delete('/activitylogs/{id}', ['uses' => 'activitylogsController@show']);

    Route::get('/settings', ['uses' => 'SettingsController@index']);
    Route::get('/settings/create', ['uses' => 'SettingsController@create']);
    Route::post('/settings', ['uses' => 'SettingsController@store']);
    Route::get('/settings/{id}', ['uses' => 'SettingsController@show']);
    Route::get('/settings/{id}/edit', ['uses' => 'SettingsController@edit']);
    Route::patch('/settings/{id}', ['uses' => 'SettingsController@update']);
    Route::delete('/settings/{id}', ['uses' => 'SettingsController@destroy']);
    Route::get('/generator', ['uses' => 'GeneratorController@index']);



});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});

