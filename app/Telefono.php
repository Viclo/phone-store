<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = [
        'nombre',
        'idcategoria',
        'idmarca',
        'pantalla',
        'procesador',
        'memoria',
        'bateria',
        'color',
        'camara',
        'descripcion',
        'imagen',
        'precio',
        'estado'
     ];
}
