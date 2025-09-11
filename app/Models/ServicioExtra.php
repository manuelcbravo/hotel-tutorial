<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioExtra extends Model
{
    protected $fillable = ['nombre','descripcion','precio','unidad'];
    protected $casts = ['precio' => 'decimal:2'];

    public function reservaciones()
    {
        return $this->belongsToMany(Reservacion::class, 'reservacion_servicio', 'servicio_id', 'reservacion_id')
                    ->withPivot(['cantidad','precio_unitario','observaciones'])
                    ->withTimestamps();
    }
}
