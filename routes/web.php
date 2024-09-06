<?php

Route::get('/', 'WebSiteController@home')->name('home');

route::get('mail', 'mailController@index');
route::post('postMail', 'mailController@post');
route::get('mail2', 'mail2Controller@index');
route::post('postMail2', 'mail2Controller@post');
route::get('mail3', 'mail3Controller@index');
route::post('postMail3', 'mail3Controller@post');
route::get('mail4', 'mail4Controller@index');
route::post('postMail4', 'mail4Controller@post');
route::get('mail5', 'mail5Controller@index');
route::post('postMail5', 'mail5Controller@post');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::resource('empresa', 'EmpresaController');
    Route::resource('galeria', 'GaleriaController');
    Route::resource('historico', 'HistoricoController');
    Route::resource('auditorio', 'AuditorioController');
    Route::resource('quartos', 'QuartoController');

    Route::get('infoquarto/{quartos}', 'InfoQuartoController@index')->name('infoquarto.index');
    Route::get('infoquarto/novo/{quartos}', 'InfoQuartoController@create')->name('infoquarto.create');
    Route::get('infoquarto/edit/{infoquarto}', 'InfoQuartoController@edit')->name('infoquarto.edit');
    Route::post('infoquarto', 'InfoQuartoController@store')->name('infoquarto.store');
    Route::put('infoquarto/{infoquarto}', 'InfoQuartoController@update')->name('infoquarto.update');
    Route::delete('infoquarto/{infoquarto}', 'InfoQuartoController@destroy');

    Route::resource('usuario', 'UserController');
    Route::get('usuario/{usuario}/editar_senha', 'UserController@editPassword')->name('usuario.editar_senha');
    Route::post('usuario/atualizar_senha/{usuario}', 'UserController@updatePassword')->name('usuario.atualizar_senha');
});

Auth::routes();
