<?php

/**
 * As rotas que estavam nesse ficheiro foram
 * trnaferidas para o ficheiro api.php
 *
 * Uma vez que as rotas da API devem ser definidas no
 * ficheiro api.php
 */


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});