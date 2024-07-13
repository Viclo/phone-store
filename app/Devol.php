<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devol extends Model
{
    protected $table = 'devols';
    protected $fillable =[
        'idcategoria','idsucursal','idmarca','codigo','nombre','precio_venta','precio_compra','stock','proveedor','descripcion','condicion','fechaA'
    ];
}
