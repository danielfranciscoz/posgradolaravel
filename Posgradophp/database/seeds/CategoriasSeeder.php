<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'Categoria'=>'Desarrollador Web',
            'Image_URL'=>'img/Resources/categorias/cat0.jpg',
            'Descripcion'=>'Este es ejemplo de la descripción de prueba larga, en donde solo se pueden incluir trescientos caracteres en donde seguimos, mostrando la información.',
            'isCursoPosgrado' => '0'
        ]);
        Categoria::create([
            'Categoria'=>'Inteligencia de Negocios',
            'Image_URL'=>'img/Resources/categorias/cat1.jpg',
            'Descripcion'=>'Probando',
            'Descripcion_larga' => 'Este es un ejemplo de la descripción de prueba larga, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos, como se muestra la información cuando llegamos al limite, por el momento esta descripción finaliza.
                                Vamos a copiar y pegar todo
                                Este es un ejemplo de la descripción de prueba larga, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos, como se muestra la información cuando llegamos al limite, por el momento esta descripción finaliza.
                                ',
            'isCursoPosgrado' => '0'
                                ]);
        Categoria::create([
            'Categoria'=>'Arte y Diseño',
            'Image_URL'=>'img/Resources/categorias/cat2.jpg',
            'Descripcion'=>'Texto que se muestra en la categoria',
            'Descripcion_larga' =>'Vamos a copiar y pegar todo, Este es un ejemplo de la descripción de prueba larga, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos',
            'isCursoPosgrado' => '1'
            ]);

        Categoria::create([
            'Categoria'=>'Medicina',
            'Image_URL'=>'img/Resources/categorias/cat3.jpg',
            'Descripcion'=>'Informacion y mas',
            'isCursoPosgrado' => '0'
            ]);
        Categoria::create([
            'Categoria'=>'Proyectos varios' ,
            'Image_URL'=>'img/Resources/categorias/cat4.jpg',
            'Descripcion'=>'Terminos a ver en la descripcion',
            'isCursoPosgrado' => '1'
            ]);
        Categoria::create([
            'Categoria'=>'Desarrollador Full Stack',
            'Image_URL'=>'img/Resources/categorias/cat5.jpg',
            'Descripcion'=>'No seguir viendo mas',
            'isCursoPosgrado' => '0'
            ]);
        Categoria::create([
            'Categoria'=>'Docente' ,
            'Image_URL'=>'img/Resources/categorias/cat6.jpg',
            'Descripcion'=>'Ultima de las descripciones de prueba',
            'isCursoPosgrado' => '1'
            ]);
        Categoria::create([
            'Categoria'=>'Finanzas',
            'Image_URL'=>'img/Resources/categorias/cat7.jpg',
            'Descripcion'=>'Aqui no hay texto, SI LO HAY',
            'isCursoPosgrado' => '1'
            ]);
    }
}
