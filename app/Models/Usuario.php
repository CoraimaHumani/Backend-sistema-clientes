<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Model
{
    use HasFactory,HasApiTokens;

    // Reemplaza 'usuario_id' con el nombre correcto de la columna
    protected $primaryKey = 'id_usuario';

    // Desactivar los timestamps automáticos
    public $timestamps = false;

    // Nombre de la tabla en la base de datos
    protected $table = 'usuario';

    protected $fillable = [
        'nombre',
        'email',
        'constrasena',
        'rol',
        'estado',
        'fecha_creacion',
    ];

    // Ocultar las columnas sensibles como la contraseña
    protected $hidden = [
        'constrasena',
    ];

    // Definir los tipos de atributos
    protected $casts = [
        'estado' => 'boolean',
        'fecha_creacion' => 'datetime',
    ];

    // Mutador para cifrar la contraseña antes de guardarla
    public function setConstrasenaAttribute($value)
    {
        $this->attributes['constrasena'] = bcrypt($value);
    }
}