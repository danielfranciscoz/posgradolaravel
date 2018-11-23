<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TematicaCurso extends Model
{
    public function curso(){
        return $this->belongsTo(Curso::Class);
    }
}
