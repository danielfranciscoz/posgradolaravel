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
        Categoria::create(['Categoria'=>'Desarrollador Web', 'Image_URL'=>'/img/Resources/categorias/cat0.png','Descripcion'=>'La descripcion es de prueba']);
        Categoria::create(['Categoria'=>'Inteligencia de Negocios', 'Image_URL'=>'/img/Resources/categorias/cat1.png','Descripcion'=>'Probando']);
        Categoria::create(['Categoria'=>'Arte y Diseño', 'Image_URL'=>'/img/Resources/categorias/cat2.png','Descripcion'=>'Texto que se muestra en la categoria']);
        Categoria::create(['Categoria'=>'Medicina', 'Image_URL'=>'/img/Resources/categorias/cat3.png','Descripcion'=>'Informacion y mas']);
        Categoria::create(['Categoria'=>'Proyectos varios' , 'Image_URL'=>'/img/Resources/categorias/cat4.png','Descripcion'=>'Terminos a ver en la descripcion']);
        Categoria::create(['Categoria'=>'Desarrollador Full Stack', 'Image_URL'=>'/img/Resources/categorias/cat5.png','Descripcion'=>'No seguir viendo mas']);
        Categoria::create(['Categoria'=>'Docente' , 'Image_URL'=>'/img/Resources/categorias/cat6.png','Descripcion'=>'Ultima de las descripciones de prueba']);
        Categoria::create(['Categoria'=>'Finanzas', 'Image_URL'=>'/img/Resources/categorias/cat7.png','Descripcion'=>'Aqui no hay texto, SI LO HAY']);
    }
}
