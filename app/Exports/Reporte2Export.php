<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;
use App\Venta;
use App\DetalleVenta;
use App\User;

class Reporte2Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
        {
            return view('pdf.ventasDet2', [
                'ventas' => Venta::join('personas','ventas.idcliente','=','personas.id')
                ->join('users','ventas.idusuario','=','users.id')
                ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
                ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
                ->join('marcas','articulos.idmarca','=','marcas.id')
                ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
                'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
                'ventas.estado','personas.nombre','personas.num_documento','personas.telefono','users.usuario','articulos.nombre as articulo','articulos.codigo','articulos.idcategoria','articulos.precio_compra','detalle_ventas.precio','detalle_ventas.descuento','detalle_ventas.estado','detalle_ventas.cantidad','marcas.nombre as nombre_marca')
                ->where('ventas.estado', '!=', 'Anulado')
                ->where('articulos.idsucursal', '=', 2) 
                ->orderBy('ventas.num_comprobante', 'desc')->get()
            ],['restas' => Venta::join('personas','ventas.idcliente','=','personas.id')
            
            ->join('users','ventas.idusuario','=','users.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
            ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
            ->select(DB::raw("SUM(detalle_ventas.precioCompra) AS sums"),'detalle_ventas.idventa')
            ->where('detalle_ventas.estado','=',1)
            ->where('articulos.idsucursal','=',2)
            ->groupBy('detalle_ventas.idventa')->get()]);
        }
}
