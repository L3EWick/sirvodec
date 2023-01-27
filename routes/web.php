<?php

Route::get ('/', 			"AuthController@login")->name('login');
Route::get ("/login", 		"AuthController@login")->name('login');
Route::post('/login', 		"AuthController@entrar");
Route::get ('/logout', 		'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

	Route::get ('/alterasenha',					'UserController@AlteraSenha');
	Route::post('/salvasenha',   				'UserController@SalvarSenha');
	Route::post('/enviarsenhausuario',			'UserController@EnviarSenhaUsuario');
	Route::post('/zerarsenhausuario',   		'UserController@ZerarSenhaUsuario');
	Route::get ('/', 							'HomeController@index')->name('home');
	// Route::get('/home', 'HomeController@index')->name('home');

	Route::delete('evento/deleteimg/{id}', 'EventosController@deleteimg');

	Route::post('evento/image', 'EventosController@storeImage')->name('evento.storeImage');

	Route::resource('experiencia', 	'ExperienciaController');
	Route::resource('profissao', 	'ProfissaoController');
	Route::resource('voluntario', 	'VoluntarioController');
	Route::resource('eventos', 		'EventosController');
	Route::resource('user',			'UserController');
	
});

