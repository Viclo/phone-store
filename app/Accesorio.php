<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    protected $fillable = [
        'nombre',
        'idcategoria',
        'idmarca',
        'color',
        'descripcion',
        'imagen',
        'estado'
     ];
}
