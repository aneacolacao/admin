<?php

App::setLocale('es');

// Perfil del usuario
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');


//Clientes
Route::get('/clientes', 'ClientsController@index'); //Definir qué va a llevar dentro, lista de clientes o lo elimino?

Route::get('/clientes/crear', 'ClientsController@create');
Route::get('/clientes/{client}', 'ClientsController@show')->name('clientes.show');

Route::post('/clientes', [
			'as' => 'clientes.store',
    		'uses' => 'ClientsController@store'
]);

Route::patch('/clientes/update/{id}', [
			'as' => 'clientes.update',
			'uses' => 'ClientsController@update'
]);
// Route::delete('/eliminar/{id}', 'ClientsController@delete');

Route::get('/clientes/editar/{id}', [
			'as' => 'clientes.edit',
			'uses' => 'ClientsController@edit',
]);
// Route::get('/eliminar/{id}', 'ClientsController@preguntar');

// Route::get('/auth/success', [
// 	'as'	=>	'auth.success',
// 	'uses'	=>	'Auth\AuthController@success'
// ]);

// controller => ClientsController 
// Eloquent model => Client
// migration => create_clients_table

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Autocomplete Projects en Clientes (crear y editar)

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));

Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));




