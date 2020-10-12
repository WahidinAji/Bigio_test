<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('User')->group(function () {
    Route::get('login', 'UserAuthController@index')->name('login');
    Route::post('user-login', 'UserAuthController@postLogin')->name('post.login');
    Route::get('register', 'UserAuthController@register')->name('register');
    Route::post('user-register', 'UserAuthController@postRegister')->name('post.register');
    Route::get('dashboard', 'UserAuthController@dashboard')->name('dashboard');
    Route::get('logout', 'UserAuthController@logout')->name('logout');
});
Route::namespace('Surveyor')->group(function () {
    Route::get('surveyor-login', 'SurveyorAuthController@index')->name('surveyor-login');
    Route::post('surveyor-login', 'SurveyorAuthController@postLogin')->name('surveyor.login');
    Route::get('surveyor-register', 'SurveyorAuthController@register')->name('surveyor-register');
    Route::post('surveyor-register', 'SurveyorAuthController@postRegister')->name('surveyor.register');
    Route::get('surveyor-dashboard', 'SurveyorAuthController@dashboard')->name('surveyor.dashboard');
    Route::get('surveyor-logout', 'SurveyorAuthController@logout')->name('surveyor.logout');

    //komoditas
    // Route::get('surveyor/laporan', 'KomoditasController@index')->name('komoditas.index');
    Route::get('surveyor-dashboard/create-komoditas', 'KomoditasController@create')->name('komoditas.create');
    Route::post('surveyor-dashboard', 'KomoditasController@store')->name('komoditas.store');
    Route::get('surveyor-dashboard/{komoditas}/edit-komoditas', 'KomoditasController@edit')->name('komoditas.edit');
    Route::put('surveyor-dashboard/{komoditas}', 'KomoditasController@update')->name('komoditas.update');
    Route::delete('surveyor-dashboard/{komoditas}', 'KomoditasController@destroy')->name('komoditas.destroy');
});

Route::namespace('Admin')->group(function () {
    Route::get('super-login', 'AdminAuthController@login')->name('super-login');
    Route::post('super-login', 'AdminAuthController@postLogin')->name('super.postlogin');
    Route::get('super-dashboard', 'AdminAuthController@dashboard')->name('super.dashboard');
    // Route::get('createadmin', 'AdminAuthController@createAdmin');
    Route::get('super-logout', 'AdminAuthController@logout')->name('super.logout');

    //Komoditas
    Route::get('super-dashboard/{komoditas}/edit', 'KomAdminController@edit')->name('admin.edit');
    Route::put('super-dashboard/{komoditas}', 'KomAdminController@update')->name('admin.update');
    Route::delete('super-dashboard/{komoditas}', 'KomAdminController@destroy')->name('admin.destroy');
});
