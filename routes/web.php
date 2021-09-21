<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');  //colleghi HomeController

Route::resource('posts', 'PostController'); //Route::resource('posts', 'PostcontrollerController::class'); altro modo in cui puoi indicarlo
//in questo modo dirai a laravel di creare anche le rotte di resources legate a un controller specifico

Route::get('/app', 'WebAppController@home');//colleghi il controller