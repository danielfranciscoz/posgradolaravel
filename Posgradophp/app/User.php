<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function estudiante(){
        return $this->hasOne(\App\Models\Estudiante::class);
    }

    // public function login($user){
        
    //     for($i=0;$i<count(Session::get('login'));$i++)
    //     {
    //        if(Session::get('login')[$i]['user']== $user->email && Session::get('login')[$i]['password']== bcrypt($user->password)){
    //             return true;                    
    //         }

            
                
    //     }
    // }

    

}
