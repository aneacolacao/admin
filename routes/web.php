<?php

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('/', 'ClientsController@index');

// Route::get('/clients/{client}', 'ClientsController@show');

Route::get('/clientes/crear', 'ClientsController@create');
Route::get('/clientes/{client}', 'ClientsController@show');

Route::post('/clients', 'ClientsController@store');

// Route::get('/auth/success', [
// 	'as'	=>	'auth.success',
// 	'uses'	=>	'Auth\AuthController@success'
// ]);

// controller => ClientsController 
// Eloquent model => Client
// migration => create_clients_table
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
