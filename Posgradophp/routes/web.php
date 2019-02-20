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

Route::get('/', 'HomeController@index')->name('cursos.index');

Route::get('/curso', function(){
    return redirect()->route('cursos.index');
});

Route::group(['prefix' => 'oferta'], function() {
    Route::group(['prefix' => 'categorias'], function() {
        Route::get('/{categoria?}/{orden?}','CursosController@categories')->name('cursos.categorias');
        Route::get('/')->name('cursos.categoriadetalle');
    });
    Route::group(['prefix' => 'maestrias'], function() {
        Route::get('/{orden?}','CursosController@maestrias')->name('cursos.maestrias');
        Route::get('/')->name('cursos.maestriadetalle');
    });
    
    Route::group(['prefix' => 'estudio'], function() {
        //Todos los cursos que cumplen con el criterio de busqueda
        Route::get('/find/{curso?}/{orden?}','CursosController@search')->name('cursos.search');
        Route::get('/find','CursosController@search')->name('cursos.searchroute');
        
        //Informacion del curso
        Route::get('/{curso_name}','CursosController@curso')->name('cursos.curso');

        Route::get('/')->name('cursos.cursodetalle');

    });
});

Route::group(['prefix' => 'account'], function() {
    
    Route::get('/login','AccountController@loginUser')->name('process.login');
    Route::get('/complete/{token}','AccountController@RegistroCompleto')->middleware('logged')->name('process.complete');
    Route::get('/complete')->middleware('logged')->name('process.completeindex');
    Route::post('/remail','AccountController@ReEmail')->name('process.remail');
    
    Route::get('/registro', 'AccountController@registro')->middleware('logged')->name('registro');
    Route::post('/registro', 'AccountController@registrar')->name('registrar');
    
    Route::get('/verificar', 'AccountController@verificar')->name('verificar.url');
    Route::get('/verificar/{token}', 'AccountController@verificar')->name('verificar');
    
    Route::get('/carrito','AccountController@carrito')->name('carrito');
    Route::get('/pagarcarrito','AccountController@resumencarrito')->name('pagarcarrito');

    //'middleware'=>'logged'
    Route::group(['prefix' => 'password','middleware'=>'logged'], function() {
        
        Route::post('/reset', 'AccountController@sendEmailreset')->name('emailresetear');
        Route::get('/reset', 'AccountController@reset')->name('resetpassword');
        
        Route::get('reset/{token}', 'AccountController@changepass')->name('resettoken');
        Route::post('/change', 'AccountController@resetpassword')->name('changepass');
    });
});

Route::group(['prefix' => 'process'],function(){

    Route::get('/addcarrito','AccountController@addcarrito')->name('process.addcarrito');
    Route::get('/delcarrito','AccountController@delcarrito')->name('process.delcarrito');
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/Forbbiden',function(){
    return view('Shared.forbidden');
});


Route::group(['prefix' => 'admin','middleware'=>'adminLogged'], function() {
    
    Route::get('/','AdminController@index')->name('admin.index');
        Route::group(['prefix' => 'categorias'], function() {
            //Route::get('/','CategoriasController@index')->name('admin.categorias');
            Route::post('/search','CategoriasController@searchcategorias')->name('admin.searchcategorias');  
        }); 
        Route::resource('categorias','CategoriasController')->names([
            'index'=>'admin.categorias',
            'store'=>'admin.categoriasSave',           
            'destroy'=>'admin.categoriasDelete',
            'update'=>'admin.categoriasUpdate',
           
        ]);
        Route::group(['prefix' => 'docentes'], function() {
            Route::post('/search','DocentesController@searchdocentes')->name('admin.searchdocentes');
           
        }); 
        Route::resource('docentes','DocentesController')->names([
            'index'=>'admin.docentes',
            'store'=>'admin.docentesSave',           
            'destroy'=>'admin.docentesDelete',
            'update'=>'admin.docentesUpdate',
           
           
        ]);

        // Route::group(['prefix' => 'usuarios'], function() {
        // });

        Route::post('usuarios/search','AccountController@searchusuarios')->name('admin.searchusuarios');           
        Route::post('usuarios/reset','AccountController@resetPasswordAdmin')->name('admin.adminReset');           

        Route::resource('usuarios','AccountController')->names([
            'index'=>'admin.usuarios',
           'store'=>'admin.usuariosSave',     //Este metodo en realidad se llama registrar      
            'destroy'=>'admin.usuariosDelete',
            'update'=>'admin.usuariosUpdate',                      
        ]);
       
        Route::group(['prefix' => 'comentarios'], function() {
            // Route::get('/','ComentariosController@index')->name('admin.comentarios');
            Route::post('/search','ComentariosController@searchcomentarios')->name('admin.searchcomentarios');
            Route::post('/save','ComentariosController@uploadphoto')->name('admin.uploadphotocometarios'); 
        }); 
        Route::resource('comentarios','ComentariosController')->names([
            'index'=>'admin.comentarios',
            'store'=>'admin.comentariosSave',           
            'destroy'=>'admin.comentariosDelete',
            'update'=>'admin.comentariosUpdate',
           
        ]);

        Route::group(['prefix' => 'cursos'], function() {
            // Route::get('/','ComentariosController@index')->name('admin.comentarios');
            Route::get('/infocurso/{id}','CursosController@searchRelacionesCurso')->name('admin.searchinfocurso');
            Route::post('/search','CursosController@searchcursos')->name('admin.searchcursos');
            Route::post('/searchrequisitos','CursosController@searchcursosrequisitos')->name('admin.searchcursosrequisitos');
            Route::post('/searchmodalidades','CursosController@searchcursosmodalidades')->name('admin.searchcursosmodalidades');
            Route::post('/searchcompetencias','CursosController@searchcursoscompetencias')->name('admin.searchcursoscompetencias');
            Route::post('/searchtematicas','CursosController@searchcursostematicas')->name('admin.searchcursostematicas');
            Route::post('/searchetiquetas','CursosController@searchcursosetiquetas')->name('admin.searchcursosetiquetas');
            Route::post('/searchdocentes','CursosController@searchcursodocentes')->name('admin.searchcursodocentes');
            Route::post('/save','CursosController@uploadphoto')->name('admin.uploadphotocursos'); 
            Route::post('/price','CursosController@updatepreciocurso')->name('admin.updatepricecourse'); 
        }); 
        Route::resource('cursos','CursosController')->names([
            'index'=>'admin.cursos',
            'store'=>'admin.cursosSave',           
            'destroy'=>'admin.cursosDelete',
            'update'=>'admin.cursosUpdate',
           
        ]);
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
