<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Estudiante;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['nombre_completo']; //Debe estar en snake_case y su metodo debe estar en CamellCase iniciando con Get, y terminando con Attribute


    public function estudiante(){
        return $this->hasOne(Estudiante::class);
    }

    public function getNombreCompletoAttribute(){
        $a= $this->estudiante()->first()->PrimerNombre ." ".$this->estudiante()->first()->PrimerApellido;
        return $a;
    }

    

}
