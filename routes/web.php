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

Route::get('/','HomeController@index')->name('home');
Route::get('/logout','HomeController@logout')->name('logout');

Route::post('/register','HomeController@create')->name('createUser');
Route::post('/login','HomeController@login')->name('loginUser');
Route::post('/cairkan','HomeController@cairkan')->name('cairkan');

Route::prefix('admin')->group(function () {
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/history','AdminController@history')->name('admin.history');
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('admin.loginPost');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('timbang/{id}', 'AdminController@timbang')->name('admin.timbang');
    Route::post('save', 'AdminController@timbangSave')->name('admin.timbang.save');
    Route::post('/setuju-cairkan', 'AdminController@cairkan')->name('admin.cairkan');
});