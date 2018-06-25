<?php

Route::get('/', function () {
    return view('initial-page.index');
});

Route::get('/calendar', function () {
    return view('communications.calendar');
});