<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Servicio extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'servicios';

    protected $primaryKey = 'id_servicio';


    // Propiedades que pueden ser asignadas en masa
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];

    // Si no deseas los campos 'created_at' y 'updated_at', puedes desactivarlos
    public $timestamps = false;

    // Mutadores y atributos accesibles pueden ser añadidos según sea necesario
}