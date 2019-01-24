<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $appends = ['horas_clase']; //Debe estar en snake_case y su metodo debe estar en CamellCase iniciando con Get, y terminando con Attribute

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

    public function docentes(){        
        return $this->belongsToMany(
            Docente::Class            
        )->withTimestamps();        
    }

    public function categoria(){
        return $this->belongsTo(Categoria::Class);
    }

    public function competencias(){
        return $this->hasMany(CompetenciaCurso::Class);
    }

    public function tematicas(){
        return $this->hasMany(Cursotematica::Class);
    }

    public function modalidades(){
        return $this->hasMany(Cursomodalidad::Class);
    }
    
    public function requisitos(){
        return $this->hasMany(Cursorequisito::Class);
    }


    public function getHorasClaseAttribute(){
        $a= $this-> tematicas()->sum('Duracion');
        return $a;
    }
}
