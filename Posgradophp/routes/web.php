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

Route::get('/curso', function(){
    return redirect()->route('cursos.index');
});


//Todos los cursos de la categoria
Route::get('categorias/{categoria}','CursosController@categories')
->name('cursos.categorias');

//Todos los cursos que cumplen con el criterio de busqueda
Route::get('curso/find/{curso}','CursosController@search')
->name('cursos.search');

//Informacion del curso
Route::get('curso/{curso_name}','CursosController@curso')
->name('cursos.curso');

// Route::get('/search/{ss}', 'SearchController@search');

Route::get('/account/registro', 'AccountController@registro')
->name('registro');

Route::get('process/addcarrito','CursosController@addcarrito')
->name('process.addcarrito');

Route::get('process/delcarrito','CursosController@delcarrito')
->name('process.delcarrito');

Route::get('account/carrito','AccountController@carrito');

Route::get('account/pagarcarrito','AccountController@pagarcarrito');


Route::get('process/login','AccountController@login')
->name('process.login');


?>