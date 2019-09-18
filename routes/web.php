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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['auth', 'admin']], function() {

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
    Route::post('/create-paf', [
        'uses' => 'processed_fieldsController@store',
        'as' => 'store.paf',
    ]);
    Route::get('/delete-paf/{id}', [
        'uses' => 'processed_fieldsController@destroy',
        'as' => 'paf.delete',
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

    /*auth*/
    Route::get('/logout', [
        'uses' => 'Controller@getLogout',
        'as' => 'logout'
    ]);

    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);
});

Route::post('/signup', [
    'uses' => 'Auth\RegisterController@create',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'Auth\LoginController@login',
    'as' => 'signin'
]);

