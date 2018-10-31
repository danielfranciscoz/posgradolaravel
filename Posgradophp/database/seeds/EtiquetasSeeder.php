<?php

use Illuminate\Database\Seeder;
use App\Models\Etiqueta;


class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etiqueta::create(['Etiqueta'=>'Programacion']);
        Etiqueta::create(['Etiqueta'=>'Desarrollo']);
        Etiqueta::create(['Etiqueta'=>'Desktop']);
        Etiqueta::create(['Etiqueta'=>'Escritorio']);
    }
}
