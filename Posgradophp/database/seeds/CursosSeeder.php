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
            'Image_URL'=>'',
            'Descripcion'=>'Con este curso el estudiante podra realizar un sinnumero de estudios',
            'HorasClase'=>'6',
            'Nivel'=>'Principiante',
            
        ]);

        Curso::create([
            'NombreCurso'=>'Programando en Python',
            'Image_URL'=>'',
            'Descripcion'=>'Esta es una descripcion de prueba',
            'HorasClase'=>'25',
            'Nivel'=>'Intermedio',
            
        ]);
    }
}
