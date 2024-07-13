<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devol;
use Carbon\Carbon;

class DevolucionController extends Controller
{

    public function index(Request $request) 
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $lobo = \Auth::user()->idrol;
         
        
        if($buscar == ''){
            $devoluciones = Devol::join('categorias','devols.idcategoria','=','categorias.id')   
            ->join('sucursals','devols.idsucursal','=','sucursals.id')   
            ->join('marcas','devols.idmarca','=','marcas.id')
            ->select('devols.id','devols.idcategoria','devols.idsucursal','devols.idmarca','devols.codigo','devols.nombre','categorias.nombre as nombre_categoria','sucursals.nombre as nombre_sucursal','marcas.nombre as nombre_marca','devols.precio_venta','devols.precio_compra','devols.stock','devols.fechaA','devols.descripcion','devols.proveedor','devols.condicion')
            ->orderBy('devols.id', 'desc')->paginate(20);
        }
        else{
            $devoluciones = Devol::join('categorias','devols.idcategoria','=','categorias.id')   
            ->join('sucursals','devols.idsucursal','=','sucursals.id')   
            ->join('marcas','devols.idmarca','=','marcas.id')
            ->select('devols.id','devols.idcategoria','devols.idsucursal','devols.idmarca','devols.codigo','devols.nombre','categorias.nombre as nombre_categoria','sucursals.nombre as nombre_sucursal','marcas.nombre as nombre_marca','devols.precio_venta','devols.precio_compra','devols.stock','devols.fechaA','devols.descripcion','devols.proveedor','devols.condicion')
            ->where('devols.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('devols.id', 'desc')->paginate(20);
        }
        
        //dd($articulos);
        return [
            
            'devoluciones' => $devoluciones,
            'lobo' => $lobo
        ];
        
    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $devolucion = new Devol();
        $devolucion->idcategoria = $request->idcategoria;
        $devolucion->idsucursal = $request->idsucursal;
        $devolucion->idmarca = $request->idmarca;
        $devolucion->codigo = $request->codigo;
        $devolucion->nombre = $request->nombre;
        $devolucion->precio_venta = $request->precio_venta;
        $devolucion->precio_compra = $request->precio_compra;
        $devolucion->stock = $request->stock;
        $devolucion->descripcion = $request->descripcion;
        $devolucion->condicion = '1';
        $devolucion->proveedor = $request->proveedor;
        $devolucion->fechaA = $request->fechadev;
        
        $devolucion->save();
    }
}
