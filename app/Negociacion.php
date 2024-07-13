<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negociacion extends Model
{
    protected $fillable = [ 
        'nombreCliente',
        'telefonoCliente',
        'idtelefono',
        'nombreTel',
        'ci',
        'marca',
        'color',
        'correo',
        'descripcion',
        'imagen',
        'condicion',   
        'estado'
     ];
}
