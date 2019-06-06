<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Pago;
use App\Models\Cursoprecio;

class Detallepago extends Model
{
    public function pago(){
        return $this->belongsTo(Pago::class);
    }

    public function cursoprecio(){
        return $this->belongsTo(Cursoprecio::class);
    }

    
}
