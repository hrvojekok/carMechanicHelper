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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/roles', function () {
    return view('roles');
});

Route::get('/items', function () {
    return view('items');
});

Route::get('/jobs', function () {
    return view('jobs');
});

Route::get('/failures', function () {
    return view('failures');
});

Route::get('/delete', function () {
    return view('jobs');
});

Route::get('/test', 'ItemController@item');


Route::delete('/test/{item}', 'ItemController@destroy');


Route::get('/delete/{item_id}', 'ItemController@delete');

//Route::get('/delete/{$newString}', 'ItemController@delete');

Route::post('roles', 'RoleController@insert');

Route::post('items', 'ItemController@insert');
