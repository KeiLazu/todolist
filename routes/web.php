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

Route::resource('/todolist', 'TodolistController');
Route::resource('/userdetail', 'UserDetailController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('image', 'ImageController');
Route::get('iseng/{id}', 'ImageController@iseng')->name('iseng');
Route::get('foo', function () {
    return 'Hello World';
});
Route::get('todolist/{todolist}/print', 'TodolistController@showPrint')->name('todolist.print');
Route::get('todolist-export', 'TodolistController@exporting')->name('todolist.exporting');
Route::post('todolist-import', 'TodolistController@importing')->name('todolist.importing');
Route::get('todolist-importExport', 'TodolistController@importexport')->name('todolist.importexport');
Route::get('todolist-pdf', 'TodolistController@makePDF')->name('todolist.pdf');
Route::get('testing', 'TestingController@testing')->name('testing.test');