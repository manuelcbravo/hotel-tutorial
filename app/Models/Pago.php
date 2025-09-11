<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['factura_id','fecha_pago','monto_pago','metodo_pago'];
    protected $casts = ['fecha_pago' => 'datetime', 'monto_pago' => 'decimal:2'];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }
}
