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
Route::get('/convocatory/tutors/{convocatory}',['uses' => 'ConvocatoryController@users_convovatories'])->name('convocatory.tutors')->middleware('verified');
Route::post('/convocatory/tutors/{user}',['uses' => 'ConvocatoryController@tutorSelected'])->name('convocatory.tutors')->middleware('verified');
Route::resource('convocatory', 'ConvocatoryController')->middleware('verified');

//Tutor
Route::get('register/tutor',['uses' => 'Auth\RegisterController@showRegistrationTutorForm'])->name('register.tutor');
Route::post('register/tutor',['uses' => 'Auth\RegisterController@registerTutor'])->name('register.tutor');
Route::get('verify/tutor', 'Auth\VerificationController@showTutor')->name('verification.tutor');


//Profile
Route::resource('profile', 'ProfileController')->middleware('verified');

//Division
Route::resource('division', 'DivisionController')->middleware('verified');
Route::get('division/modules/{division}', 'DivisionController@IndexModulesFromDivision')->middleware('verified')->name('divisions.modules');

//Career
Route::resource('career', 'CareerController')->middleware('verified');

//Module
Route::resource('module', 'ModuleController')->middleware('verified');

//Subscription
Route::post('subscription',['uses' => 'SubscriptionController@store'])->name('subscription.module.store');
Route::delete('unsubscribe',['uses' => 'SubscriptionController@destroy'])->name('subscription.module.destroy');

//Post
Route::resource('post', 'PostController')->middleware('verified');

//File
Route::resource('file', 'FileController', ['except' => ['create', 'edit', 'update']]);


Auth::routes(['verify' => true]);


