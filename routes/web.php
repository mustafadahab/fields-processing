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
    return view('home');
});

/* Field routes*/
Route::get('/addField', function () {
    return view('new-field');
})->name('add-field');

Route::post('/createField', [
    'uses' => 'FieldsController@store',
    'as' => 'field.create',
]);

/*Tractor routes*/
Route::get('/addTractor', function () {
    return view('new-tractor');
})->name('add-tractor');

Route::post('/createTractor', [
    'uses' => 'TractorsController@create',
    'as' => 'tractor.store',
]);

/*Processing a Field routes*/

Route::get('/processing_a_field', [
    'uses' => 'processed_fieldsController@create',
    'as' => 'paf-create',
]);
Route::post('/createpaf', [
    'uses' => 'processed_fieldsController@store',
    'as' => 'store.paf',
]);

/*Reports routes*/
Route::get('/reports', [
    'uses' => 'reportsController@index',
    'as' => 'display-reports',
]);
Route::post('/filter-reports', [
    'uses' => 'reportsController@filter',
    'as' => 'filter',
]);


