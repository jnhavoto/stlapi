<?php


Auth::routes();




Route::get('/', function () {
    return view('initial-page.index');
})
    ->middleware(['teacher'])
;


//
//Route::get('/calendar', function () {
//    return view('communications.calendar');
//})->middleware(['auth2','teacher']);
//

Route::get('/home', function () {
    return view('test');
});