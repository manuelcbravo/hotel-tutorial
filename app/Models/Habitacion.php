<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Habitacion extends Model
{
    protected $fillable = ['numero_habitacion','tipo_id','estado'];

    public function tipo()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_id');
    }

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'habitacion_id');
    }

    public function scopeDisponibles(Builder $query, $inicio, $fin): Builder
    {
        return $query->whereDoesntHave('reservaciones', function ($q) use ($inicio, $fin) {
            $q->traslape($inicio, $fin)->activas();
        })->where('estado', 'disponible');
    }
}
