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
//グループでまとめることができる
Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){
    Route::get('index', 'ContactformController@index')->name('contact.index');
    Route::get('create', 'ContactformController@create')->name('contact.create');
    Route::post('store', 'ContactformController@store')->name('contact.store');
    Route::get('show/{id}', 'ContactformController@show')->name('contact.show');
    Route::get('edit/{id}', 'ContactformController@edit')->name('contact.edit');
    Route::post('update/{id}', 'ContactformController@update')->name('contact.update');
    Route::post('destroy/{id}', 'ContactformController@destroy')->name('contact.destroy');
});


//REST
//Route::resource('contacts', 'ContactformController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
