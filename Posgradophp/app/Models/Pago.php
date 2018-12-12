<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Detallepago;
use App\User;

class Pago extends Model
{
    public function detallepagos(){
        return $this->hasMany(Detallepago::Class);
    }
    
    public function user(){
        return $this->hasOne(User::class);
    }
}
