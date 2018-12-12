<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Pago;

class Detallepago extends Model
{
    public function pago(){
        return $this->hasOne(Pago::class);
    }

    
}
