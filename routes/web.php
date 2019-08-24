<?php


//početna stranica --Automehaničarske radionice--
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

//home page -- nakon login-a
Route::get('/home', 'HomeController@index')->name('home');

//uloge
Route::get('/roles', function () {
    return view('roles');
});
Route::post('roles', 'RoleController@insert');

//narudžba popravka -- korisnik usluge
Route::get('/items', function () {
    return view('items');
});
Route::post('items', 'ItemController@insert');

//naručeni popravci -- korisnik usluge
Route::get('/failures', function () {
    return view('failures');
});

//dogovoreni poslovi -- vlasnik automehaničarske radionice
Route::get('/jobs', function () {
    return view('jobs');
});
//brise item(narudžbu) sa brojem {item}, poziva funkciju destroy iz item controllera
Route::delete('/jobs/{item}', 'ItemController@destroy');

//popis svih narudžbi sa imenima automehaničara i imenima osobe koja je naručila popravak
Route::get('/admin', function () {
    return view('admin');
});
