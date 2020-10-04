<?php

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

Route::get('tests/test', 'TestController@index');

//ログイン後に入れるようにする
Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){
    Route::get('index', 'ContactFromController@index')->name('contact.index');
    Route::get('create', 'ContactFromController@create')->name('contact.create');
});


//REST
//Route::resource('contacts', 'ContactFromController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
