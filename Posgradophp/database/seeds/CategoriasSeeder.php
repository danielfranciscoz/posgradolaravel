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
            'Image_URL'=>'/img/Resources/categorias/cat0.png',
            'Descripcion'=>'Este es un ejemplo de la descripción de prueba corta, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos, como se muestra la información cuando llegamos al limite, por el momento esta descripción finaliza.',
            'BackColor' => '#424242'
        ]);
        Categoria::create([
            'Categoria'=>'Inteligencia de Negocios',
            'Image_URL'=>'/img/Resources/categorias/cat1.png',
            'Descripcion'=>'Probando',
            'Descripcion_larga' => 'Este es un ejemplo de la descripción de prueba larga, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos, como se muestra la información cuando llegamos al limite, por el momento esta descripción finaliza.
                                Vamos a copiar y pegar todo
                                Este es un ejemplo de la descripción de prueba larga, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos, como se muestra la información cuando llegamos al limite, por el momento esta descripción finaliza.
                                ',
            'BackColor' => '#4E342E'
                                ]);
        Categoria::create([
            'Categoria'=>'Arte y Diseño',
            'Image_URL'=>'/img/Resources/categorias/cat2.png',
            'Descripcion'=>'Texto que se muestra en la categoria',
            'Descripcion_larga' =>'Vamos a copiar y pegar todo, Este es un ejemplo de la descripción de prueba larga, en donde, solo se pueden incluir, trescientos caracteres, en donde seguimos, mostrando la información, mas contenido, para mostrar, ahora veremos',
            'BackColor' => '#9E9D24'
            ]);

        Categoria::create([
            'Categoria'=>'Medicina',
            'Image_URL'=>'/img/Resources/categorias/cat3.png',
            'Descripcion'=>'Informacion y mas',
            'BackColor' => '#00695C'
            ]);
        Categoria::create([
            'Categoria'=>'Proyectos varios' ,
            'Image_URL'=>'/img/Resources/categorias/cat4.png',
            'Descripcion'=>'Terminos a ver en la descripcion',
            'BackColor' => '#4527A0'
            ]);
        Categoria::create([
            'Categoria'=>'Desarrollador Full Stack',
            'Image_URL'=>'/img/Resources/categorias/cat5.png',
            'Descripcion'=>'No seguir viendo mas',
            'BackColor' => '#1565C0'
            ]);
        Categoria::create([
            'Categoria'=>'Docente' ,
            'Image_URL'=>'/img/Resources/categorias/cat6.png',
            'Descripcion'=>'Ultima de las descripciones de prueba',
            'BackColor' => '#AD1457'
            ]);
        Categoria::create([
            'Categoria'=>'Finanzas',
            'Image_URL'=>'/img/Resources/categorias/cat7.png',
            'Descripcion'=>'Aqui no hay texto, SI LO HAY',
            'BackColor' => '#c62828'
            ]);
    }
}
