<?php

use Illuminate\Database\Seeder;
use App\Models\Docente;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docente::create([
            'Nombres'=>'Francisco Muñoz',
            'Profesion'=>'Ingeniero de Sistemas',
            'Descripcion'=>'Destacado desarrollador, con 5 años de experiencia, perteneciente al MVA, Google Developers Team',
            'Image_URL'=>'/img/Resources/estudiantes/est1.png'
        ]);

        Docente::create([
            'Nombres'=>'Daniel Zamora',
            'Profesion'=>'Arquitecto',
            'Descripcion'=>'Destacado desarrollador, con 5 años de experiencia, perteneciente al MVA, Google Developers Team',
            'Image_URL'=>'/img/Resources/estudiantes/est2.png'
        ]);
        Docente::create([
            'Nombres'=>'Yasser Montiel',
            'Profesion'=>'Ingeniero de Ciencias',
            'Descripcion'=>'Destacado desarrollador, con 5 años de experiencia, perteneciente al MVA, Google Developers Team',
            'Image_URL'=>'/img/Resources/estudiantes/est3.png'
        ]);
        Docente::create([
            'Nombres'=>'Radamez Lozano',
            'Profesion'=>'Ingeniero de Software',
            'Descripcion'=>'Destacado desarrollador, con 5 años de experiencia, perteneciente al MVA, Google Developers Team',
            'Image_URL'=>'/img/Resources/estudiantes/est4.png'
        ]);

        $docente = Docente::find(1);
        $cursos = [1,2,3,4,5,6];
        $docente->cursos()->attach($cursos);

        $docente = Docente::find(2);
        $cursos = [1,2,3,7,8,9];
        $docente->cursos()->attach($cursos);

        $docente = Docente::find(3);
        $cursos = [1,2,5,6];
        $docente->cursos()->attach($cursos);

        $docente = Docente::find(4);
        $cursos = [1,2,3,8,9];
        $docente->cursos()->attach($cursos);
    }
}
