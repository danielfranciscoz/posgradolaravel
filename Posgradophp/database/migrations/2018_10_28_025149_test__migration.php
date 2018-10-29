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
        schema::create('cursos', function (Blueprint $table) {
            $table->increments('IdCurso');
            $table->string('NombreCurso');
            $table->string('Image_URL');
            $table->string('Descripcion');
            $table->integer('HorasClase');
            $table->enum('Nivel', ['Principiante','Intermedio','Avanzado']);
            $table->timestamps(); //Agrega automaticamente fecha de creacion y actualizacion
            $table->softDeletes(); //Agrega automaticamente fecha de eliminacion de la fila
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
        //Siempre que se cree una tabla, tambien se debe crear su forma de eliminacion para el rollback
        schema::dropIfExists('Cursos');
   
    }
}
