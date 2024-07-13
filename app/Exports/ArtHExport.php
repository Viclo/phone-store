<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Articulo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class ArtHExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->join('detalle_ingresos','articulos.id','=','detalle_ingresos.idarticulo')
            ->join('ingresos','detalle_ingresos.idingreso','=','ingresos.id')
            ->join('proveedores','ingresos.idproveedor','=','proveedores.id')
            ->join('marcas','articulos.idmarca','=','marcas.id')
        ->join('sucursals','articulos.idsucursal','=','sucursals.id')
        ->join('marcas','articulos.idmarca','=','marcas.id')
        ->select('articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','proveedores.contacto as cont','sucursals.nombre as nombre_sucursal','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.stock','articulos.created_at','articulos.descripcion')
        ->where('articulos.stock','>',0)
        ->orderBy('articulos.created_at', 'desc')->get();
    }
    public function view(): View
    {
        return view('pdf.articulos', [
            'articulos' => Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('sucursals','articulos.idsucursal','=','sucursals.id') 
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('personas','articulos.idpersona','=','personas.id')
            ->select('articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','sucursals.nombre as nombre_sucursal','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','personas.nombre as nomp','articulos.created_at','articulos.descripcion','articulos.condicion')
            ->where('articulos.stock','>',0)
            ->where('articulos.idcategoria','=',1)
            ->where('articulos.idsucursal',2)
            ->where('articulos.condicion','!=',5)
            ->orderBy('articulos.created_at', 'desc')->get()
        ]);
    }
}
