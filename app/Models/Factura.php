<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['reservacion_id','monto_total','fecha_emision','estado_pago'];
    protected $casts = ['fecha_emision' => 'datetime', 'monto_total' => 'decimal:2'];

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class, 'reservacion_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'factura_id');
    }
}
