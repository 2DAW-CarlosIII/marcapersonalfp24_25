<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ciclo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'codCiclo',
        'codFamilia',
        'familia_id',
        'grado',
        'nombre'
    ];

    public static $filterColumns = ['codCiclo', 'codFamilia', 'grado', 'nombre'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_ciclos', 'ciclo_id', 'user_id');
    }

    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyecto::class, 'proyectos_ciclos');
    }

}
