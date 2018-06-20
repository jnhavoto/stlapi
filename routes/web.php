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
    return view('initial-page.index');
});

Route::get('/teste', function () {
    return view('login');
});


Route::get('/ass', function () {
    return view('assigments.index');
});

Route::get('/newass', function () {
    return view('assigments.newassigment');
});

Route::get('/listass', function () {
    return view('assigments.listassignments');
});