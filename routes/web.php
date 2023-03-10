<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', 'HomeController@index');

Route::get('/category', 'CategoryController@index');
Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/store', 'CategoryController@store');
Route::get('/category/edit/{id}', 'CategoryController@edit');
Route::patch('/category/{id}', 'CategoryController@update');
Route::delete('/category/{id}', 'CategoryController@destroy');

