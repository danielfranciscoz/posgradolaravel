<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    public function etiquetas(){        
        /*
        EL segundo campo define el nombre de la tabla en la cual se crea la relacion,
        Laravel usa la nomenclatura (orden alfabetico) "PrimeraTablaSingular_SegundaTablaSingular
        para nombrar la relacion, en caso de que no le pase el segundo parametro.
        */
        return $this->belongsToMany(
            Etiqueta::Class
            // ,'curso_etiqueta'
            // ,'curso_id' //Llave foranea de curso_etiqueta
            // ,'etiqueta_id' //Llave foranea de curso_etiqueta
            // ,'id' //Llave primaria de la tabla curso_etiqueta 
            // ,'id' //Llave primaria de Etiqueta
        )->withTimestamps();        
    }

    public function categoria(){
        return $this->belongsTo(Categoria::Class);
    }
}
