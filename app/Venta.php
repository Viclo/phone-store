<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable =[
        'idcliente',
        'idusuario',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'vendedor',
        'impuesto',
        'moneda',
        'total',
        'exchange_rate',
        'nota',
        'pago1',
        'pago2',
        'pago3',
        'estado',
        'fecha_2',
        'fecha_3'
    ];
}
