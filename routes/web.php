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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('student-classes', 'StudentClassController')->middleware(['auth']);
Route::resource('student-spps', 'StudentSppController')->middleware(['auth']);
Route::resource('students', 'StudentController')->middleware(['auth']);
Route::resource('operators', 'OperatorController')->middleware(['auth']);
Route::resource('payments', 'PaymentController')->middleware(['auth']);
