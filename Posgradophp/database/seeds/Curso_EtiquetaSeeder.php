<?php

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Etiqueta;

class Curso_EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = Curso::find(2);
        $etiquetas = [2,1,3];
        //Inserta las etiquetas 1,2 y 3 para el curso 2
        $curso->etiquetas()->attach($etiquetas);

        $etiqueta=Etiqueta::find(4);
        $cursos = [1,2];
        $etiqueta->cursos()
        ->attach($cursos);

        $curso = Curso::find(3);
        $etiquetas = [1,4];
        $curso->etiquetas()->attach($etiquetas);
        
        $curso = Curso::find(4);
        $etiquetas = [2,3,4];
        $curso->etiquetas()->attach($etiquetas);
        
        
    }
}
