<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model

{
        
    protected $fillable =[
        'idcategoria','idsucursal','idmarca','codigo','nombre','precio_venta','precio_compra','stock','proveedor','descripcion','condicion','fechaA'
    ];
    
}
