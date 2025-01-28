<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParticipantesProyecto extends Model
{

    use HasFactory;

    protected $fillable = [
        'users_id',
        'proyecto_id',
    ];

    public static $filterColumns = ['users_id', 'proyecto_id'];
}
