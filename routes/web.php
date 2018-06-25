<?php


Auth::routes();


Route::get('/', function () {
    return view('initial-page.index');
});

Route::get('/calendar', function () {
    return view('communications.calendar');
});


Route::get('/test', function () {
    return view('test');
});