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
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('123456Aa'),
        'isAdmin' => true,
       ]);

       Estudiante::create([
           'user_id'=>'1',
           'Nombres'=>'Primer Nombre',
           'Apellidos'=>'Segundo Nombre',
           'DNI'=>'0000000000000A',
           'Telefono'=>'2252-2252',
            'isSuscript'=>true
       ]);
    }
}
