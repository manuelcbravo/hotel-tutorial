<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class Reservacion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cliente_id','habitacion_id','fecha_entrada','fecha_salida','num_huespedes','estatus_id'
    ];
    protected $casts = [
        'fecha_entrada' => 'date',
        'fecha_salida'  => 'date',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    public function estatus()
    {
        return $this->belongsTo(EstatusReservacion::class, 'estatus_id');
    }

    public function factura()
    {
        return $this->hasOne(Factura::class, 'reservacion_id');
    }

    public function serviciosExtra()
    {
        return $this->belongsToMany(ServicioExtra::class, 'reservacion_servicio', 'reservacion_id', 'servicio_id')
                    ->withPivot(['cantidad','precio_unitario','observaciones'])
                    ->withTimestamps();
    }

    public function scopeTraslape(Builder $query, $inicio, $fin): Builder
    {
        return $query->where(function ($q) use ($inicio, $fin) {
            $q->whereBetween('fecha_entrada', [$inicio, $fin])
              ->orWhereBetween('fecha_salida', [$inicio, $fin])
              ->orWhere(function ($q2) use ($inicio, $fin) {
                  $q2->where('fecha_entrada', '<=', $inicio)
                     ->where('fecha_salida', '>=', $fin);
              });
        });
    }

    /**
     * Scope: Reservaciones activas (no canceladas).
     */
    public function scopeActivas(Builder $query): Builder
    {
        return $query->whereHas('estatus', function ($q) {
            $q->whereNotIn('nombre', ['cancelada']);
        });
    }
}
