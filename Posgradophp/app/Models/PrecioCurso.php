<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecioCurso extends Model
{
    public function curso(){
        return $this->belongsTo(Curso::Class);
    }
}
