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

Route::group(['prefix' => 'oferta'], function() {
    Route::get('categorias/{categoria?}/{orden?}','CursosController@categories')->name('cursos.categorias');
    Route::get('maestrias/{orden?}','CursosController@maestrias')->name('cursos.maestrias');
    
    Route::group(['prefix' => 'estudio'], function() {
        //Todos los cursos que cumplen con el criterio de busqueda
        Route::get('/find/{curso?}/{orden?}','CursosController@search')->name('cursos.search');
        
        //Informacion del curso
        Route::get('/{curso_name}','CursosController@curso')->name('cursos.curso');

    });
});

Route::group(['prefix' => 'account'], function() {
    
    Route::get('/login','AccountController@loginUser')->name('process.login');
    Route::get('/complete/{token}','AccountController@RegistroCompleto')->middleware('logged')->name('process.complete');
    Route::post('/remail','AccountController@ReEmail')->name('process.remail');
    
    Route::get('/registro', 'AccountController@registro')->middleware('logged')->name('registro');
    Route::post('/registro', 'AccountController@registrar')->name('registrar');
    
    Route::get('/verificar/{token}', 'AccountController@verificar')->name('verificar');
    
    Route::get('/carrito','AccountController@carrito');
    Route::get('/pagarcarrito','AccountController@resumencarrito');

    //'middleware'=>'logged'
    Route::group(['prefix' => 'password'], function() {
        Route::post('/reset', 'AccountController@sendEmailreset')->name('emailresetear');
        Route::get('/reset', 'AccountController@reset')->name('resetpassword');
        
        Route::get('reset/{token}', 'AccountController@changepass')->name('resettoken');
        Route::post('/change', 'AccountController@resetpassword')->name('changepass');
    });
});

Route::group(['prefix' => 'process'],function(){

    Route::get('/addcarrito','CursosController@addcarrito')->name('process.addcarrito');
    Route::get('/delcarrito','CursosController@delcarrito')->name('process.delcarrito');
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/Forbbiden',function(){
    return view('Shared.forbidden');
});


Route::group(['prefix' => 'admin'], function() {
    
    Route::get('/','AdminController@index')->middleware('adminLogged')->name('admin.index');
        Route::group(['prefix' => 'categorias'], function() {
            Route::get('/','AdminController@categorias')->middleware('adminLogged')->name('admin.categorias');
            Route::get('/search','AdminController@searchcategorias')->middleware('adminLogged')->name('admin.searchcategorias');  
        });  
        Route::group(['prefix' => 'comentarios'], function() {
            Route::get('/','AdminController@comentarios')->middleware('adminLogged')->name('admin.comentarios');
            Route::get('/search','AdminController@searchcomentarios')->middleware('adminLogged')->name('admin.searchcomentarios'); 
        }); 
});

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
