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

        //La oferta serán Maestrías, Cursos de Especialización, Posgrados
        schema::create('ofertas', function(Blueprint $table){
            $table->increments('id');
            $table->string('Oferta');       
            $table->timestamps(); 
            $table->softDeletes();
        });

        //Ejemplo, para los cursos de especializacion serán: Computacion y Sistemas, Industria, Mantenimiento Equipos, etc.
        schema::create('categorias', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('oferta_id'); //Si esta categoria pertenece a un Cursos, Posgrado o Maestria
            $table->string('Categoria');
            $table->string('Image_URL');   
            $table->string('BackColor',12);   
            $table->string('Descripcion',150);   
            $table->text('Descripcion_larga')->nullable();       
            $table->timestamps(); 
            $table->softDeletes();

            $table->foreign('oferta_id')->references('id')->on('ofertas');
        });

        schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoria_id')->nullable(); //Cuando sea NULL se referirá a una Maestría 
            $table->string('NombreCurso');
            $table->string('Image_URL');
            $table->text('Descripcion');
            $table->integer('HorasClase');
            $table->string('Nivel');
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
