<?php


Auth::routes();


Route::get('/', function () {
    return view('initial-page.index');
})->middleware('auth');

Route::get('/calendar', function () {
    return view('communications.calendar');
})->middleware('auth');


Route::get('/test', function () {
    return view('test');
});