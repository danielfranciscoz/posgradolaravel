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

Route::get('/', 'CursosController@index');

Route::get('/{curso}','CursosController@search');
// Route::get('/prueba',function(){
// return "Esta es una ruta de prueba 2";
// });


Route::get('/search/{ss}', 'SearchController@search');

Route::get('/account/registro', 'AccountController@registro');
