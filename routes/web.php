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

Route::get('/', 'SearchController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route untuk ruangan
Route::resource('kategori', 'KategoriController')->middleware('checkLevel:admin');

Route::resource('ruangan', 'RuanganController')->middleware('checkLevel:admin');

Route::resource('user', 'UserController')->middleware('checkLevel:admin');

Route::get('/pic', 'UserController@pic')->name('pic')->middleware('checkLevel:pic');

Route::get('/pic/{id}/edit', 'BarangController@editpic')->name('pic.edit')->middleware('checkLevel:pic');

Route::get('/pic/{id}/update', 'BarangController@updatepic')->name('pic.update')->middleware('checkLevel:pic');

Route::resource('submission', 'SubmissionController');

Route::resource('barang', 'BarangController');



