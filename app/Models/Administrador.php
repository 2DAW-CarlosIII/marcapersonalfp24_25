<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    protected $fillable = ['id', 'user_id'];

    public static $filterColumns = ['user_id'];

    public $timestamps = false;

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
