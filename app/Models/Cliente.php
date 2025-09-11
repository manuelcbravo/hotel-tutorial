<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre','apellido','email','telefono','direccion'];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'cliente_id');
    }
}
