<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'id',
        'docente_id',
        'nombre',
        'dominio',
        'metadatos',
        'fichero',
        'calificacion',
        'url_github'
    ];


    public static $filterColumns = ['docente_id', 'nombre', 'dominio', 'calificacion', 'url_github'];


    /**
     * Mutator para convertir el array 'metadatos' a JSON antes de guardarlo en la base de datos
     *
     */


    public function setMetadatosAttribute($value)
    {
        $this->attributes['metadatos'] = json_encode($value);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'participantes_proyectos');
    }
}
