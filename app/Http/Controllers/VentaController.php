<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Venta;
use App\DetalleVenta;
use App\User;
use App\Notifications\NotifyAdmin;
 
class VentaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $timer= Carbon::now('America/La_Paz');
        $timer = $timer->format('Y-m-d');
        $cabra = \Auth::user()->sucursal;

        if($cabra!='Central'){ 
        if ($buscar==''){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
            'ventas.estado','personas.nombre','personas.num_documento','users.usuario')
            ->where('ventas.estado','!=','Anulado')
            ->where('users.sucursal',$cabra)
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
        }
        else{
            if ($criterio=='codigo'){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
            ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda','articulos.codigo as imei',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('ventas.estado','!=','Anulado')
            ->where('users.sucursal',$cabra)
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
            }
            else if($criterio=='nombre'){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('ventas.estado','!=','Anulado')
            ->where('users.sucursal',$cabra)
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
            }
            else{
                $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
                ->join('users','ventas.idusuario','=','users.id')
                ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
                'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
                'ventas.estado','personas.nombre','users.usuario')
                ->where('ventas.'.$criterio, 'like', '%'. $buscar . '%')
                ->where('ventas.estado','!=','Anulado')
                ->where('users.sucursal',$cabra)
                ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
                }   
           
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
            'timer' => $timer
        ];
    }else{
        if ($buscar==''){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
            'ventas.estado','personas.nombre','personas.num_documento','users.usuario')
            ->where('ventas.estado','!=','Anulado')
            
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
        }
        else{
            if ($criterio=='codigo'){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
            ->join('articulos','detalle_ventas.idarticulo','=','articulos.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda','articulos.codigo as imei',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('ventas.estado','!=','Anulado')
            
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
            }
            else if($criterio=='nombre'){
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('ventas.estado','!=','Anulado')
            
            ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
            }
            else{
                $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
                ->join('users','ventas.idusuario','=','users.id')
                ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
                'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda',
                'ventas.estado','personas.nombre','users.usuario')
                ->where('ventas.'.$criterio, 'like', '%'. $buscar . '%')
                ->where('ventas.estado','!=','Anulado')
                
                ->orderBy('ventas.num_comprobante', 'desc')->paginate(20);
                }   
           
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
            'timer' => $timer
        ];
    }
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $idroli = \Auth::user()->idrol;
        $venta = Venta::join('personas','ventas.idcliente','=','personas.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
        'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.total','ventas.moneda','ventas.pago1','ventas.pago2','ventas.pago3','ventas.fecha_2','ventas.fecha_3','ventas.nota',
        'ventas.estado','personas.nombre','personas.telefono','users.usuario')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id', 'desc')->take(1)->get();
         
        return ['venta' => $venta,'idroli'=>$idroli];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->join('marcas','articulos.idmarca','=','marcas.id')
        ->select('detalle_ventas.cantidad','detalle_ventas.estado','detalle_ventas.precioCompra','detalle_ventas.precio','detalle_ventas.descuento',
        'articulos.nombre as articulo','articulos.codigo','articulos.idcategoria','articulos.descripcion','marcas.nombre as nombre_marca')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id', 'desc')->get();
         
        return ['detalles' => $detalles];
    }
    public function pdf(Request $request,$id){
        $venta = Venta::join('personas','ventas.idcliente','=','personas.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
        'ventas.num_comprobante','ventas.fecha_hora','ventas.vendedor','ventas.impuesto','ventas.moneda','ventas.total','ventas.pago1','ventas.pago2','ventas.pago3','ventas.nota',
        'ventas.estado','personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','users.usuario')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id','desc')->take(1)->get();

        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->join('marcas','articulos.idmarca','=','marcas.id')
        ->select('detalle_ventas.cantidad','detalle_ventas.estado','detalle_ventas.precioCompra','detalle_ventas.precio','detalle_ventas.descuento',
        'articulos.nombre as articulo','articulos.codigo','articulos.idcategoria','marcas.nombre as nombre_marca')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id','desc')->get();

        $numventa=Venta::select('num_comprobante')->where('id',$id)->get();

        $pdf = \PDF::loadView('pdf.venta',['venta'=>$venta,'detalles'=>$detalles]);
        return $pdf->download('venta-'.$numventa[0]->num_comprobante.'.pdf');

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
            $venta->moneda = $request->moneda;
            $venta->total = $request->total;
            $venta->nota = $request->nota;
            $venta->pago1 = $request->pago1;
            $venta->pago2 = $request->pago2;
            $venta->pago3 = $request->pago3;
            if($request->totalParcial!=$venta->pago1){
                $venta->estado = 'Endeuda';
            }else if($request->total==0){
            $venta->estado = 'Cambio';
            } else{
                $venta->estado = 'Registrado';
            }
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
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->pago2 = $request->pago2;
        $venta->fecha_2 = $request->fecha2;
        if($request->pago3 != 0){
        $venta->pago3 = $request->pago3;
        $venta->fecha_3 = $request->fecha3;
        }
        if($request->totalParcial!=($venta->pago1+$venta->pago2)){
            if($request->totalParcial!=($venta->pago1+$venta->pago2+$venta->pago3)){
                $venta->estado = 'Endeuda';
            }else{
            $venta->estado = 'Registrado';
            }
        }else{
        $venta->estado = 'Registrado';
        }
        $venta->save();
    }
    public function updateF(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->fecha_hora = $request->fecha;
        $venta->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->estado = 'Anulado';
        $venta->save();
    }
}