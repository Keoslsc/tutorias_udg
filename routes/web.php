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
Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/home_admin',['as' => 'home_admin', 'uses' => 'RootController@index']);

//Route::get('/informacion_alumno', ['as' => 'informacion_alumno', 'uses' => 'ControllerPages@HomeStudentController']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
