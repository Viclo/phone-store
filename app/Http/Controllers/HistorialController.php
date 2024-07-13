<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $lobo = \Auth::user()->idrol;
         
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_transferencias','articulos.id','=','detalle_transferencias.idarticulo')
            ->join('transferencias','detalle_transferencias.idtransferencia','=','transferencias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion','transferencias.origen','transferencias.destino',
            'transferencias.fecha_hora','detalle_transferencias.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',1)
            ->where('transferencias.origen','Central')
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
            $articulos2 = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_transferencias','articulos.id','=','detalle_transferencias.idarticulova')
            ->join('transferencias','detalle_transferencias.idtransferencia','=','transferencias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion','transferencias.origen','transferencias.destino',
            'transferencias.fecha_hora','detalle_transferencias.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',1)
            ->where('transferencias.destino','Central')
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        

            $articulosi = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_ingresos','articulos.id','=','detalle_ingresos.idarticulo')
            ->join('ingresos','detalle_ingresos.idingreso','=','ingresos.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion',
            'ingresos.fecha_hora','detalle_ingresos.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',1)
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        
            $articulosv = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_ventas','articulos.id','=','detalle_ventas.idarticulo')
            ->join('ventas','detalle_ventas.idventa','=','ventas.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion',
            'ventas.fecha_hora','detalle_ventas.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',1)
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);

            $articulosh = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_transferencias','articulos.id','=','detalle_transferencias.idarticulo')
            ->join('transferencias','detalle_transferencias.idtransferencia','=','transferencias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion','transferencias.origen','transferencias.destino',
            'transferencias.fecha_hora','detalle_transferencias.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',2)
            ->where('transferencias.origen','Hipermaxy')
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
            $articulosh2 = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_transferencias','articulos.id','=','detalle_transferencias.idarticulova')
            ->join('transferencias','detalle_transferencias.idtransferencia','=','transferencias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion','transferencias.origen','transferencias.destino',
            'transferencias.fecha_hora','detalle_transferencias.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',2)
            ->where('transferencias.destino','Hipermaxy')
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        

            $articulosih = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_ingresos','articulos.id','=','detalle_ingresos.idarticulo')
            ->join('ingresos','detalle_ingresos.idingreso','=','ingresos.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion',
            'ingresos.fecha_hora','detalle_ingresos.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',2)
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        
            $articulosvh = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_ventas','articulos.id','=','detalle_ventas.idarticulo')
            ->join('ventas','detalle_ventas.idventa','=','ventas.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion',
            'ventas.fecha_hora','detalle_ventas.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',2)
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);

            $articulosic = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_transferencias','articulos.id','=','detalle_transferencias.idarticulo')
            ->join('transferencias','detalle_transferencias.idtransferencia','=','transferencias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion','transferencias.origen','transferencias.destino',
            'transferencias.fecha_hora','detalle_transferencias.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',3)
            ->where('transferencias.origen','IC Norte')
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
            $articulosic2 = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_transferencias','articulos.id','=','detalle_transferencias.idarticulova')
            ->join('transferencias','detalle_transferencias.idtransferencia','=','transferencias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion','transferencias.origen','transferencias.destino',
            'transferencias.fecha_hora','detalle_transferencias.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',3)
            ->where('transferencias.destino','IC Norte')
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        

            $articulosiic = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_ingresos','articulos.id','=','detalle_ingresos.idarticulo')
            ->join('ingresos','detalle_ingresos.idingreso','=','ingresos.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion',
            'ingresos.fecha_hora','detalle_ingresos.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',3)
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        
            $articulosvic = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')     
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('detalle_ventas','articulos.id','=','detalle_ventas.idarticulo')
            ->join('ventas','detalle_ventas.idventa','=','ventas.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.fechaA','articulos.descripcion','articulos.condicion',
            'ventas.fecha_hora','detalle_ventas.cantidad')
            ->where('articulos.condicion','!=',5)
            ->where('articulos.idcategoria','=',2)
            ->where('articulos.idsucursal','=',3)
            ->where('articulos.'.$criterio, '=', $buscar )
            ->orderBy('articulos.id', 'desc')->paginate(20);
        

        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos,
            'articulos2' => $articulos2,
            'articulosi' => $articulosi,
            'articulosv' => $articulosv,
            'articulosh' => $articulosh,
            'articulosh2' => $articulosh2,
            'articulosih' => $articulosih,
            'articulosvh' => $articulosvh,
            'articulosic' => $articulosic,
            'articulosic2' => $articulosic2,
            'articulosiic' => $articulosiic,
            'articulosvic' => $articulosvic,
            'lobo' => $lobo
        ];
        
    }
}
