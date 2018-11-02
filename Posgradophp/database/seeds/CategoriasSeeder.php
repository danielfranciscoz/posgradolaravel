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
        Categoria::create(['Categoria'=>'Desarrollador Web']);
        Categoria::create(['Categoria'=>'Inteligencia de Negocios']);
        Categoria::create(['Categoria'=>'Arte y Diseño']);
        Categoria::create(['Categoria'=>'Medicina']);
        Categoria::create(['Categoria'=>'Proyectos varios']);
        Categoria::create(['Categoria'=>'Desarrollador Full Stack']);
        Categoria::create(['Categoria'=>'Docente']);
        Categoria::create(['Categoria'=>'Finanzas']);
    }
}
