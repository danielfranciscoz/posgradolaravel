<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    protected $primaryKey = 'user_id';

    public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
