<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'id',
        'docente_id',
        'insignia'
    ];

    public static $filterColumns = ['docente_id', 'insignia'];

    public function reconocimientos(): HasMany
    {
        return $this->hasMany(Reconocimiento::class);
    }

    public function competencias(): BelongsToMany
    {
        return $this->belongsToMany(
            Competencia::class, 'competencias_actividades','competencia_id','actividad_id'
        );
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reconocimientos', 'actividad_id', 'estudiante_id')->withPivot('documento');
    }

    //gestion de roles

    public function esDocente(): bool
    {
        return $this->getEmailDomain() === env('TEACHER_EMAIL_DOMAIN');
    }

    public function esPropietario($recurso, $propiedad = 'docente_id'): bool
    {
        return $recurso && $recurso->$propiedad === $this->id;
    }

    private function getEmailDomain(): string
    {
        $dominio = explode('@', $this->email)[1];
        return $dominio;
    }
}

