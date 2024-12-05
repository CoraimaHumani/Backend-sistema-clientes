<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioAsignado extends Model
{
    use HasFactory;

    // Especificamos la tabla en la base de datos
    protected $table = 'servicios_asignados';
    
    // Especificamos la clave primaria
    protected $primaryKey = 'id_asignacion';

    // Indicamos que no estamos utilizando timestamps
    public $timestamps = false;

    // Definimos los campos que son asignables masivamente
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'dias_calendario',
        'estado',
        'comentarios',
        'id_cliente',
        'id_servicio',
    ];

    // Relación con Cliente: Un servicio asignado pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    // Relación con Servicio: Un servicio asignado pertenece a un servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }
}
