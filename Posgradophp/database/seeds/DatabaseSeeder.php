<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); //Desactivo la verificacion de llaves foraneas para poder eliminar en caso de que exista relacion entre tablas
        DB::table('categorias')->truncate(); 
        DB::table('comentarios')->truncate(); 
        DB::table('competenciacursos')->truncate(); 
        DB::table('curso_docente')->truncate(); 
        DB::table('curso_etiqueta')->truncate(); 
        DB::table('cursos')->truncate(); //Elimina todos los registros de la tabla
        DB::table('docentes')->truncate(); 
        DB::table('etiquetas')->truncate(); 
        DB::table('cursomodalidads')->truncate(); 
        DB::table('cursoprecios')->truncate(); 
        DB::table('cursorequisitos')->truncate(); 
        DB::table('cursotematicas')->truncate(); 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); //Reactivo la verificacion de llaves foraneas
        
        $this->call(UsersSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(ComentariosSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(EtiquetasSeeder::class);
        $this->call(Curso_EtiquetaSeeder::class);
        $this->call(DocentesSeeder::class);
    }
    
    //Para ejecutar los inserts hay que escribir en la linea de comandos
    //php artisan db:seed
}
