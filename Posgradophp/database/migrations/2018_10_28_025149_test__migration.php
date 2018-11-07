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

        schema::create('categorias', function(Blueprint $table){
            $table->increments('id');
            $table->string('Categoria');
            $table->string('Image_URL');     
            $table->string('Descripcion');       
            $table->timestamps(); 
            $table->softDeletes();
        });

        schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NombreCurso');
            $table->string('Image_URL');
            $table->string('Descripcion');
            $table->integer('HorasClase');
            $table->string('Nivel');
            $table->unsignedInteger('categoria_id');
            $table->timestamps(); //Agrega automaticamente fecha de creacion y actualizacion
            $table->softDeletes(); //Agrega automaticamente fecha de eliminacion de la fila
            
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
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
        schema::dropIfExists('cursos');
        schema::dropIfExists('etiquetas');
        schema::dropIfExists('curso_etiqueta');
    }
}
