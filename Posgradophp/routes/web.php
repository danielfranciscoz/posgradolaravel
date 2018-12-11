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

Route::get('/', 'CursosController@index')->name('cursos.index');

Route::get('/curso', function(){
    return redirect()->route('cursos.index');
});

//Todos los cursos de la categoria
Route::get('categorias/{categoria}','CursosController@categories')->name('cursos.categorias');

Route::group(['prefix' => 'curso'], function() {
    //Todos los cursos que cumplen con el criterio de busqueda
    Route::get('/find/{curso}','CursosController@search')->name('cursos.search');

    //Informacion del curso
    Route::get('/{curso_name}','CursosController@curso')->name('cursos.curso');
});

Route::group(['prefix' => 'account'], function() {

    Route::get('/registro', 'AccountController@registro')->name('registro');
    Route::post('/registro', 'AccountController@registrar')->name('registro');
    Route::get('/verificar/{token}', 'AccountController@verificar')->name('verificar');
    Route::get('/carrito','AccountController@carrito');
    Route::get('/pagarcarrito','AccountController@pagarcarrito');
    Route::get('/login','AccountController@loginUser')->name('process.login');
});

Route::group(['prefix' => 'process'],function(){

    Route::get('/addcarrito','CursosController@addcarrito')->name('process.addcarrito');
    Route::get('/delcarrito','CursosController@delcarrito')->name('process.delcarrito');
});


Route::post('logout', 'Auth\LoginController@logout')->name('logout');


/*

 // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 // Registration Routes...

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


 // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

 // Email Verification Routes...

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/home', 'HomeController@index')->name('home');*/

?>
