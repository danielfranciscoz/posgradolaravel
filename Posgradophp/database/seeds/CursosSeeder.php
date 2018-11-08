<?php

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Realiza insert a la tabla, esto sirve para cuando se esta creando la base de datos desde cero
        Curso::create([
            'NombreCurso'=>'Programando en Java',
            'Image_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Descripcion'=>'Con este curso el estudiante podra realizar un sinnumero de estudios',
            'HorasClase'=>'6',
            'Nivel'=>'Principiante',
            'categoria_id'=>'1'
            
        ]);

        Curso::create([
            'NombreCurso'=>'Programando en Python',
            'Image_URL'=>'/img/Resources/cursos/test_img_1.png',
            'Descripcion'=>'Esta es una descripcion de prueba',
            'HorasClase'=>'25',
            'Nivel'=>'Intermedio',
            'categoria_id'=>'1'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Cuso Intensivo Laravel',
            'Image_URL'=>'/img/Resources/cursos/test_img_3.png',
            'Descripcion'=>'Esta es una descripcion de prueba para el curso de laravel',
            'HorasClase'=>'12',
            'Nivel'=>'Avanzado',
            'categoria_id'=>'1'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Desarrollo Web con Angular',
            'Image_URL'=>'/img/Resources/cursos/test_img_4.png',
            'Descripcion'=>'Angular, como el futuro de la web',
            'HorasClase'=>'38',
            'Nivel'=>'Avanzado',
            'categoria_id'=>'2'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Tecnicas de Pedagogia Virtual',
            'Image_URL'=>'/img/Resources/cursos/test_img_5.png',
            'Descripcion'=>'Implementacion de nuevas tecnologias TIC para impartir clases',
            'HorasClase'=>'12',
            'Nivel'=>'Intermedio',
            'categoria_id'=>'1'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Maquinas Virtuales (VWWare Station)',
            'Image_URL'=>'/img/Resources/cursos/test_img_6.png',
            'Descripcion'=>'Esta es una descripcion de prueba',
            'HorasClase'=>'18',
            'Nivel'=>'Principiante',
            'categoria_id'=>'2'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Matematicas Interactivas',
            'Image_URL'=>'/img/Resources/cursos/test_img_7.png',
            'Descripcion'=>'Esta es una descripcion de prueba',
            'HorasClase'=>'50',
            'Nivel'=>'Avanzado',
            'categoria_id'=>'1'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Redaccion tecnica',
            'Image_URL'=>'/img/Resources/cursos/test_img_8.png',
            'Descripcion'=>'Esta es una descripcion de prueba',
            'HorasClase'=>'15',
            'Nivel'=>'Intermedio',
            'categoria_id'=>'2'
        ]);
        
        Curso::create([
            'NombreCurso'=>'Diseños arquitectonicos',
            'Image_URL'=>'/img/Resources/cursos/test_img_9.png',
            'Descripcion'=>'Esta es una descripcion de prueba',
            'HorasClase'=>'10',
            'Nivel'=>'Avanzado',
            'categoria_id'=>'2'
        ]);
    }
}
