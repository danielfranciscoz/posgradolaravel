<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursotematica extends Model
{
    public function curso(){
        return $this->HasOne(Curso::Class);
    }
}
