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

Route::get('/students', function () {
    return view('students.students');
});

Route::get('/addcourse', function () {
    return view('courses.addcourse');
});

Route::get('/listcourses', function () {
    return view('courses.listcourses');
});

Route::get('/teste', function () {
    return view('login');
});



Route::get('/ass', 'test@index');


//Route::get('/ass', function () {
//    return view('assigments.index');
//});

Route::get('/newass', function () {
    return view('assigments.addassigment');
});

Route::get('/listass', function () {
    return view('assigments.listassignments');
});


Route::get('/messages', function () {
    return view('messages.messages');
});