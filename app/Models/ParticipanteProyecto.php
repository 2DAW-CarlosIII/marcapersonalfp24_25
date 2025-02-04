<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipanteProyecto extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'proyecto_id'];
    protected $table = 'participantes_proyectos';
    public static $filterColumns;

}
