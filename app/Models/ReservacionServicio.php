<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservacionServicio extends Model
{
    protected $fillable = [
        'reservacion_id',
        'servicio_id',
        'cantidad',
        'precio_unitario', 
        'observaciones'
    ];

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class, 'reservacion_id');
    }

    public function servicio()
    {
        return $this->belongsTo(ServicioExtra::class, 'servicio_id');
    }
}
