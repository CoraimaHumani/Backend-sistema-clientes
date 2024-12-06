<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioAsignado extends Model
{
    use HasFactory;

    protected $table = 'servicios_asignados';
    
    protected $primaryKey = 'id_asignacion';

    public $timestamps = false;

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
