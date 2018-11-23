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

Route::get('/', 'CursosController@index')
->name('cursos.index');

Route::get('/cursos', function(){
    redirect()->route('cursos.index');
});

Route::get('categorias/{categoria}','CursosController@categories')
->name('cursos.categorias');


Route::get('cursos/{curso}','CursosController@search')
->name('cursos.search');

// Route::get('/prueba',function(){
// return "Esta es una ruta de prueba 2";
// });


// Route::get('/search/{ss}', 'SearchController@search');

Route::get('/account/registro', 'AccountController@registro')
->name('registro');

Route::get('curso/{curso}','CursosController@curso')
->name('cursos.curso');

Route::get('account/carrito','AccountController@carrito');


// Route::get('curso/addcarrito', function () {
//     Session::push('cartItems', [
//         'curso' = > 'Curso laravel',    
//         'cantidad' = > 1  ]);
//     return 'Creating a note';
// });
