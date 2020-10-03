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

Route::get('/products','admin\ProductController@index')->name('products.index');
Route::post('/products/store','admin\ProductController@store')->name('products.store');
Route::post('/products/{id}','admin\ProductController@update')->name('products.update');
Route::get('/products/show/{id}','admin\ProductController@show')->name('products.show');
Route::get('/products/table','admin\ProductController@getAllTable')->name('products.table');
Route::get('/products/delete/{id}','admin\ProductController@destroy')->name('products.delete');
Route::get('/products/search','admin\ProductController@search')->name('products.search');

Route::get('login','admin\AdminController@postLogin')->name('login');
Route::post('login','admin\AdminController@login')->name('login.post');

Route::get('index_user','admin\UserController@index')->name('user.index')->middleware('checkAlc:user-list');
Route::get('/user/create','admin\UserController@create')->name('user.create');
Route::post('/user/store','admin\UserController@store')->name('user.store');
Route::post('/user/{id}','admin\UserController@update')->name('user.update');
Route::get('/user/getData/{id}','admin\UserController@getData')->name('user.getData');
Route::get('/user/table','admin\UserController@table')->name('user.table');
Route::put('/user/{id}','admin\UserController@update')->name('user.update');
Route::get('/user/destroy/{id}','admin\UserController@destroy')->name('user.destroy');
Route::get('/user/search','admin\UserController@search')->name('user.search');
Route::get('/user/error','admin\UserController@error')->name('user.error');

Route::get('role','admin\RoleController@index')->name('role.index');
Route::get('/role/table','admin\RoleController@table')->name('role.table');
Route::get('/role/search','admin\RoleController@search')->name('role.search');
Route::post('/role','admin\RoleController@store')->name('role.store');
Route::get('/role/getBy/{id}','admin\RoleController@getBy')->name('role.getBy');
Route::put('/role/{id}','admin\RoleController@update')->name('role.update');
Route::get('/role/destroy/{id}','admin\RoleController@destroy')->name('role.destroy');

Route::get('category','admin\CategoryController@index')->name('category.index');
Route::get('/category/table','admin\CategoryController@table')->name('category.table');
Route::get('/category/search','admin\CategoryController@search')->name('category.search');
Route::post('/category','admin\CategoryController@store')->name('category.store');
Route::get('/category/getBy/{id}','admin\CategoryController@getBy')->name('category.getBy');
Route::put('/category/{id}','admin\CategoryController@update')->name('category.update');
Route::get('/category/destroy/{id}','admin\CategoryController@destroy')->name('category.destroy');




Route::middleware(['auth'])->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('users', function () {
        });
    });


});
