<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public function cursos(){
        return $this->belongsToMany(
            Curso::Class
            // ,'curso_etiqueta'
            // ,'curso_id' //Llave foranea de curso_etiqueta
            // ,'etiqueta_id' //Llave foranea de curso_etiqueta
            // ,'id' //Llave primaria de la tabla curso_etiqueta 
            // ,'id' //Llave primaria de Etiqueta
        )->withTimestamps();
}
}
