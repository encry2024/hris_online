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
   return redirect()->to('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('applicants/export', 'ApplicantController@exportToCsv')->name('export_to_csv');

Route::resource('applicant', 'ApplicantController');