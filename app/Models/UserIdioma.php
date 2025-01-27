<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdioma extends Model
{



    use HasFactory;

    protected $table = 'user_idiomas';

    protected $fillable = [
        'user_id',
        'idioma_id',
        'nievl',
        'certificado'
    ];
}
