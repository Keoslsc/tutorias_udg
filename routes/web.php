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

//Home Routes
Route::get('/','HomeController@index')->name("home")->middleware('verified');
Route::get('/home', 'HomeController@index')->middleware('verified');

//Convocatory
Route::resource('convocatory', 'ConvocatoryController')->middleware('verified');

//Tutor
Route::get('register/tutor',['uses' => 'Auth\RegisterController@showRegistrationTutorForm'])->name('register.tutor');
Route::post('register/tutor',['uses' => 'Auth\RegisterController@registerTutor'])->name('register.tutor');
Route::get('verify/tutor', 'Auth\VerificationController@showTutor')->name('verification.tutor');

Auth::routes(['verify' => true]);


