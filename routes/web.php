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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index','ProductsController@getindex');

Route::get('index_admin','admin\ProductController@index');
Route::post('/product/store','admin\ProductController@store')->name('product.store');
Route::get('/product/{id}/edit','admin\ProductController@edit');
Route::put('/product/{id}','admin\ProductController@update')->name('product.update');
Route::get('/product/getData/{id}','admin\ProductController@getData')->name('product.getData');
Route::get('/product/table','admin\ProductController@table')->name('product.table');
Route::get('/product/delete/{id}','admin\ProductController@destroy')->name('product.delete');
Route::get('login','admin\AdminController@login')->name('login');
Route::post('login','admin\AdminController@postLogin')->name('login.post');

Route::get('index_user','admin\UserController@index')->name('user.index');
Route::post('/user/store','admin\UserController@store')->name('user.store');
Route::post('/user/{id}','admin\UserController@update')->name('user.update');
