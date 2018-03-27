<?php

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Get Department of Course 1
Route::get('/test', function (){
  return  \App\Models\Course::find(1)->department->get();
});

// Get all courses of department 2
Route::get('/test2', function (){
    return  \App\Models\Department::find(1)->courses()->get();
});

Route::get('/test3', function (){
    return  \App\Models\Course::find(1)->teacher_courses->get();
});
=======
/**
 * As rotas que estavam nesse ficheiro foram
 * trnaferidas para o ficheiro api.php
 *
 * Uma vez que as rotas da API devem ser definidas no
 * ficheiro api.php
 */
>>>>>>> 3ef08a4b3f216f815c45245beb750ff2dfeb3447
