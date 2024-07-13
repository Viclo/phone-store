<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Venta;
use App\DetalleVenta;
use App\Marca; 

use Illuminate\Http\Request;
 
class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');
        $ingresos=DB::table('ingresos as i')
        ->select(DB::raw('MONTH(i.fecha_hora) as mes'),
        DB::raw('YEAR(i.fecha_hora) as anio'),
        DB::raw('SUM(i.total) as total'))
        ->whereYear('i.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(i.fecha_hora)'),DB::raw('YEAR(i.fecha_hora)'))
        ->get();
 
        $ventas=DB::table('ventas as v')
        ->select(DB::raw('MONTH(v.fecha_hora) as mes'),
        DB::raw('YEAR(v.fecha_hora) as anio'),
        DB::raw('SUM(v.total) as total'))
        ->whereYear('v.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(v.fecha_hora)'),DB::raw('YEAR(v.fecha_hora)'))
        ->get();

        $traspasos=DB::table('transferencias as t')
        ->select(DB::raw('MONTH(t.fecha_hora) as mes'),
        DB::raw('YEAR(t.fecha_hora) as anio'),
        DB::raw('SUM(t.total) as total'))
        ->whereYear('t.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(t.fecha_hora)'),DB::raw('YEAR(t.fecha_hora)'))
        ->get();
        
        $marcas = Venta::join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
                ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
                ->join('marcas','articulos.idmarca','=','marcas.id')
                ->select(
                DB::raw('MONTH(ventas.fecha_hora) as mes'),
                DB::raw('YEAR(ventas.fecha_hora) as anio'),
                DB::raw('SUM(detalle_ventas.cantidad) as total'))
                ->whereYear('ventas.fecha_hora',$anio)
                ->where('marcas.nombre','=','XIAOMI')
                ->groupBy(DB::raw('MONTH(ventas.fecha_hora)'),DB::raw('YEAR(ventas.fecha_hora)'),'articulos.idmarca')
                ->get();

        $celulares = Venta::join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
                ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
                ->join('marcas','articulos.idmarca','=','marcas.id')
                ->select(
                DB::raw('MONTH(ventas.fecha_hora) as mes'),
                DB::raw('YEAR(ventas.fecha_hora) as anio'),'marcas.nombre as nombre_marca',
                DB::raw('SUM(detalle_ventas.cantidad) as total'))
                ->whereYear('ventas.fecha_hora',$anio)
                ->where('articulos.idcategoria','=',1)
                //->where('marcas.nombre','=','XIAOMI')
                ->groupBy(DB::raw('MONTH(ventas.fecha_hora)'),DB::raw('YEAR(ventas.fecha_hora)'),'articulos.idmarca','marcas.nombre')
                ->get();

        $mar = Marca::select('marcas.id')->where('marcas.nombre','=','XIAOMI')->get();
 
        return ['ingresos'=>$ingresos,'ventas'=>$ventas,'anio'=>$anio,'traspasos'=>$traspasos,'marcas'=>$marcas,'mar'=>$mar,'celulares'=>$celulares];      
 
    }
}