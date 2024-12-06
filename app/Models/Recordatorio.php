<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    use HasFactory;

    protected $table = 'recordatorios';

    protected $primaryKey = 'id_recordatorio';

    protected $fillable = [
        'mensaje',
        'fecha_envio',
        'id_cliente',
        'id_servicio',
        'id_usuario',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public $timestamps = false;

}
