<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatusReservacion extends Model
{
    protected $fillable = ['nombre','descripcion'];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'estatus_id');
    }
}
