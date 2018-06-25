<?php

Route::get('/', function () {
    return view('initial-page.index');
});

<<<<<<< HEAD

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('initial-page.index');
=======
Route::get('/calendar', function () {
    return view('communications.calendar');
>>>>>>> 295d75aa0c2291c9160945b1239640761e56ecc1
});