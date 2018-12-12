<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Ejemplo, para los cursos de especializacion serán: Computacion y Sistemas, Industria, Mantenimiento Equipos, etc.
        schema::create('categorias', function(Blueprint $table){
            $table->increments('id');
            $table->boolean('isCursoPosgrado'); //Si esta categoria pertenece a un Cursos o Posgrado
            $table->string('Categoria');
            $table->string('Image_URL');    
            $table->string('Descripcion',150);   
            $table->text('Descripcion_larga')->nullable();       
            $table->timestamps(); 
            $table->softDeletes();
        });

        schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoria_id')->nullable(); //Si es null entonces se refiere a una Maestría
            $table->string('NombreCurso');
            $table->string('Image_URL');
            $table->string('Temario_URL');
            $table->text('Desc_Publicidad');
            $table->text('Desc_Introduccion');
            $table->text('InfoAdicional');
            $table->timestamps(); //Agrega automaticamente fecha de creacion y actualizacion
            $table->softDeletes(); //Agrega automaticamente fecha de eliminacion de la fila            
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        schema::create('cursoprecios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curso_id');
            $table->float('Precio');
            $table->timestamps(); 
            $table->softDeletes();           
            $table->foreign('curso_id')->references('id')->on('cursos');
   
        });

        schema::create('competenciacursos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curso_id');
            $table->string('competencia');
            $table->timestamps(); 
            $table->softDeletes();           
            $table->foreign('curso_id')->references('id')->on('cursos');
        });

        schema::create('cursotematicas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curso_id');
            $table->string('Tematica');
            $table->unsignedInteger('Duracion');
            $table->timestamps(); 
            $table->softDeletes();           
            $table->foreign('curso_id')->references('id')->on('cursos');
        });

        schema::create('cursomodalidads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curso_id');
            $table->string('Modalidad');
            $table->string('Horario');
            $table->timestamps(); 
            $table->softDeletes();           
            $table->foreign('curso_id')->references('id')->on('cursos');
        });

        schema::create('cursorequisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curso_id');
            $table->string('Requisito');
            $table->timestamps(); 
            $table->softDeletes();           
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
        
        schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombres');
            $table->string('Profesion');
            $table->string('Descripcion');
            $table->string('Image_URL');
            $table->timestamps(); 
            $table->softDeletes();           
        });

        schema::create('curso_docente',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('curso_id'); 
            $table->unsignedInteger('docente_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('docente_id')->references('id')->on('docentes');
        });

        schema::create('etiquetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Etiqueta');
            $table->timestamps();
            $table->softDeletes();

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        schema::create('curso_etiqueta',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('curso_id'); //Para la relacion, no funciona si le pongo Integer, tiene que ser unsignedInteger porque el atributo de la otra tabla es auto incrementable
            $table->unsignedInteger('etiqueta_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas');
        });

        schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Profesion');
            $table->string('Desc_Pais');
            $table->string('Comentario',2000);
            $table->string('Image_URL');
            $table->timestamps();
            $table->softDeletes();
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        // schema::create('pagos',function(BluePrint $table){
        //     $table->increments('id');
        //     $table->Integer('user_id');
        //     $table->timestamps();
        //     $table->softDeletes();

        //     $table->foreign('user_id')->references('id')->on('users');
        // });

        // schema::create('detallepagos',function(BluePrint $table){
        //     $table->increments('id');
        //     $table->integer('pago_id');
        //     $table->integer('cursoprecio_id');
        //     $table->timestamps();
        //     $table->softDeletes();

        //     $table->foreign('pago_id')->references('id')->on('pagos');
        //     $table->foreign('cursoprecio_id')->references('id')->on('cursoprecios');
        // });

        



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Para eliminar la tabla primero se deben eliminar sus relaciones
        schema::table('curso_etiqueta',function(Blueprint $table){
            $table->dropForeign(['curso_id','etiqueta_id']);
        });

        //Siempre que se cree una tabla, tambien se debe crear su forma de eliminacion para el rollback
        schema::dropIfExists('categorias');
        schema::dropIfExists('cursos');
        schema::dropIfExists('etiquetas');
        schema::dropIfExists('curso_etiqueta');
        schema::dropIfExists('comentarios');
    }
}
