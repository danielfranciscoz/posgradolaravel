<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class routeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    //Estoy ejecutando una prueba a la ruta especificada
    public function testRoute(){
        $this->get('/prueba')
        ->assertStatus(200)
        //La ruta retorna el texto: "Esta es una ruta de prueba 2"
        ->assertSee('sta es una ruta de prueba'); //esta linea verifica que la ruta contenga el texto que estoy especificando
    }   
}
