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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/cadastrar', 'ProductController@viewFormRegister');
Route::post('/produtos/cadastrar', 'ProductController@create');

Route::get('/produtos/atualizar/{id?}', 'ProductController@viewFormUpdate');
Route::post('produtos/atualizar', 'ProductController@update');

Route::get('/produtos', 'ProductController@viewAllProducts');
Route::get('/produtos/deletar/{id?}', 'ProductController@delete');