<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Estudiante;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name' => 'admin@admin.com',
        'email' => 'admin@admin.com',
        'password' => bcrypt('123456'),
        'isAdmin' => true,
        'token' => str_random(50)
       ]);

       Estudiante::create([
           'user_id'=>'1',
           'PrimerNombre'=>'Admin',
           'SegundoNombre'=>'nistrador',
           'PrimerApellido'=>'admin',
           'SegundoApellido'=>'administra',
           'DNI'=>'0000000000000A',
           'Telefono'=>'2252-2252',
           'isSuscript'=>true
       ]);

       User::create([
        'name' => 'danielfranciscoz@hotmail.com',
        'email' => 'danielfranciscoz@hotmail.com',
        'password' => bcrypt('1234'),
        'isAdmin' => true,
        'token' => str_random(50)
       ]);

       Estudiante::create([
           'user_id'=>'2',
           'PrimerNombre'=>'Daniel',
           'SegundoNombre'=>'Francisco',
           'PrimerApellido'=>'Zamora',
           'SegundoApellido'=>'Muñoz',
           'DNI'=>'0010000000000A',
           'Telefono'=>'2253-2252',
           'isSuscript'=>true
       ]);
    }
}
