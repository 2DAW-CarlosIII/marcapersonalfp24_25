<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FamiliaProfesional extends Model
{
    protected $table = 'familias_profesionales';

    protected $fillable = [
        'id',
        'codigo',
        'nombre',
        'imagen'
    ];

    public function ciclos(): HasMany
    {
        return $this->hasMany(Ciclo::class, 'familia_id', 'id');
    }

    public static $filterColumns = ['codigo', 'nombre'];

}
