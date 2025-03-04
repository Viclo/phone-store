<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteExport;
use App\Exports\Reporte2Export;
use App\Exports\Reporte3Export;
use App\Exports\ReporteMesExport;
use Carbon\Carbon;
use App\Venta;
use App\DetalleVenta;
use App\User;
use App\Notifications\NotifyAdmin;

 
class ReportesController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;


        $restas = Venta::join('personas','ventas.idcliente','=','personas.id')
        ->where('detalle_ventas.estado','=',1)
        ->join('users','ventas.idusuario','=','users.id')
        ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
        ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->select(DB::raw("SUM(detalle_ventas.precioCompra) AS sums"),'detalle_ventas.idventa')
        ->groupBy('detalle_ventas.idventa')->paginate(20);
        
         
        if ($buscar==''){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
            ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','personas.num_documento','personas.telefono','users.usuario','articulos.nombre as articulo','articulos.codigo','articulos.precio_compra','articulos.precio_venta','detalle_ventas.descuento','detalle_ventas.estado')
            //->where('detalle_ventas.estado','=',0)
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
        }
        else{
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
            ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','personas.num_documento','personas.telefono','users.usuario','articulos.nombre as articulo','articulos.codigo','articulos.precio_compra','articulos.precio_venta','detalle_ventas.descuento','detalle_ventas.estado')
            ->where('ventas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
        }
         
        return [
            'pagination' => [
                'total'        => $ventas->total(),
                'current_page' => $ventas->currentPage(),
                'per_page'     => $ventas->perPage(),
                'last_page'    => $ventas->lastPage(),
                'from'         => $ventas->firstItem(),
                'to'           => $ventas->lastItem(),
            ],
            'ventas' => $ventas,
            'restas' => $restas
        ];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $venta = Venta::join('personas','ventas.idcliente','=','personas.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
        'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total',
        'ventas.estado','personas.nombre','users.usuario')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id', 'desc')->take(1)->get();
         
        return ['venta' => $venta];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->select('detalle_ventas.cantidad','detalle_ventas.estado','detalle_ventas.precioCompra','detalle_ventas.precio','detalle_ventas.descuento',
        'articulos.nombre as articulo')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id', 'desc')->get();
         
        return ['detalles' => $detalles];
    }
    public function pdf(Request $request,$id){
        $venta = Venta::join('personas','ventas.idcliente','=','personas.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
        'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total',
        'ventas.estado','personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','users.usuario')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id','desc')->take(1)->get();

        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->select('detalle_ventas.cantidad','detalle_ventas.estado','detalle_ventas.precioCompra','detalle_ventas.precio','detalle_ventas.descuento',
        'articulos.nombre as articulo')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id','desc')->get(); 

        $numventa=Venta::select('num_comprobante')->where('id',$id)->get();

        $pdf = \PDF::loadView('pdf.venta',['venta'=>$venta,'detalles'=>$detalles]);
        return $pdf->download('venta-'.$numventa[0]->num_comprobante.'.pdf');

    }
    public function excel(){
        
        return Excel::download(new ReporteExport, 'reporteVentas.xlsx');
    }
    public function excel2(){
        
        return Excel::download(new Reporte2Export, 'reporteVentasHyper.xlsx');
    }
    public function excel3(){
        
        return Excel::download(new Reporte3Export, 'reporteVentasIc.xlsx');
    }
    public function excelMes(Request $request){
        
        $mes = $request->mes;
        $anio = $request->anio;
        $sucu = $request->sucu;
        //return Excel::download(new ReporteMesExport, 'reporte$mes.xlsx')->porMes($mes);
        return (new ReporteMesExport)->porMes($mes,$anio,$sucu)->download('reporte'.$mes.$anio.'.xlsx');
    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        try{
            DB::beginTransaction();
 
            $mytime= Carbon::now('America/La_Paz');
 
            $venta = new Venta();
            $venta->idcliente = $request->idcliente;
            $venta->idusuario = \Auth::user()->id;
            $venta->tipo_comprobante = $request->tipo_comprobante;
            $venta->serie_comprobante = $request->serie_comprobante;
            $venta->num_comprobante = $request->num_comprobante;
            $venta->vendedor = $request->vendedor;
            $venta->fecha_hora = $request->fechav;
            $venta->impuesto = $request->impuesto;
            $venta->total = $request->total;
            $venta->estado = 'Registrado';
            $venta->save();
 
            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos
 
            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleVenta();
                $detalle->idventa = $venta->id;
                $detalle->idarticulo = $det['idarticulo'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->estado = $det['estado'];
                $detalle->precioCompra = $det['precioCompra'];
                $detalle->precio = $det['precio'];
                $detalle->descuento = $det['descuento'];         
                $detalle->save();
            }          
            $fechaActual= date('Y-m-d');
            $numVentas = DB::table('ventas')->whereDate('created_at',$fechaActual)->count();
            $numIngresos = DB::table('ingresos')->whereDate('created_at',$fechaActual)->count();

            $arreglosDatos = [
                'ventas' => [
                            'numero' => $numVentas,
                            'msj' => 'Ventas'
                        ],
                'ingresos' => [
                            'numero' => $numIngresos,
                            'msj' => 'Ingresos'
                ]
            ];
            $allUsers = User::all();

            foreach ($allUsers as $notificar){
                User::findOrFail($notificar->id)->notify(new NotifyAdmin($arreglosDatos));
            }
            DB::commit();
            return [
                'id'=> $venta->id
            ];
        } catch (Exception $e){
            DB::rollBack();
        }
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->estado = 'Anulado';
        $venta->save();
    }
}