<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    protected $fillable = ['nombre','descripcion','capacidad','precio_noche'];

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'tipo_id');
    }
}
