<?php

use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Comentario::create([
            'Nombre'=>'Alejandro Perez',
            'Comentario'=>'Los cursos impartidos en este sitio lograron llenar mis expectativas, estoy listo para iniciar mas aprendizaje',
            'Image_URL'=>'img/Resources/estudiantes/est1.jpg',
            'Profesion' => 'Ingeniero de Software',
            'Desc_Pais' => 'Bogotá, Colombia'
         ]);
         Comentario::create([
            'Nombre'=>'Juana Mendoza',
            'Comentario'=>'Muy buenos docentes, calidad de educación virtual',
            'Image_URL'=>'img/Resources/estudiantes/est2.jpg',
            'Profesion' => 'Licendiado en Comercio Internacional',
            'Desc_Pais' => 'San José, Costa Rica'
         ]);
         Comentario::create([
            'Nombre'=>'Jaime Camil',
            'Comentario'=>'Mi comentario es de prueba, espero sea de utilidad en el sitio web',
            'Image_URL'=>'img/Resources/estudiantes/est3.jpg',
            'Profesion' => 'Ingeniero Industrial',
            'Desc_Pais' => 'Los Angeles, California'
         ]);
         Comentario::create([
            'Nombre'=>'Ester Moncada',
            'Comentario'=>'Para mayor informacion de los cursos por favor presiones click sobre alguno de ellos',
            'Image_URL'=>'img/Resources/estudiantes/est4.jpg',
            'Profesion' => 'Administrador de Empresas',
            'Desc_Pais' => 'Managua, Nicaragua'
         ]);
         Comentario::create([
            'Nombre'=>'Roger Montes',
            'Comentario'=>'Este es el ultimo comentario que les escribo, espero todo quede muy bien',
            'Image_URL'=>'img/Resources/estudiantes/est5.jpg',
            'Profesion' => 'Gerente de Proyectos',
            'Desc_Pais' => 'León, Nicaragua'
         ]);
    }
}
