<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Model
{
    use HasFactory,HasApiTokens;

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $table = 'usuario';

    protected $fillable = [
        'nombre',
        'email',
        'constrasena',
        'rol',
        'estado',
        'fecha_creacion',
    ];

    protected $hidden = [
        'constrasena',
    ];

    protected $casts = [
        'estado' => 'boolean',
        'fecha_creacion' => 'datetime',
    ];

    public function setConstrasenaAttribute($value)
    {
        $this->attributes['constrasena'] = bcrypt($value);
    }
}