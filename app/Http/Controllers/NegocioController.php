<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Negociacion;
use DB;

class NegocioController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $lobo = \Auth::user()->idrol;
         
        
        if ($buscar==''){
            $negocios = Negociacion::select('negociacions.id','negociacions.idtelefono','negociacions.telefonoCliente','negociacions.nombreCliente','negociacions.nombreTel','negociacions.ci','negociacions.marca','negociacions.color','negociacions.correo','negociacions.descripcion','negociacions.imagen','negociacions.created_at','negociacions.condicion','negociacions.estado')
            ->orderBy('negociacions.id', 'desc')->paginate(20);
        }
        else{
            $negocios = Negociacion::select('negociacions.id','negociacions.idtelefono','negociacions.telefonoCliente','negociacions.nombreCliente','negociacions.nombreTel','negociacions.ci','negociacions.marca','negociacions.color','negociacions.correo','negociacions.descripcion','negociacions.imagen','negociacions.created_at','negociacions.condicion','negociacions.estado')
            ->where('negociacions.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('negociacions.id', 'desc')->paginate(20);
        }
        return [
            'pagination' => [
                'total'        => $negocios->total(),
                'current_page' => $negocios->currentPage(),
                'per_page'     => $negocios->perPage(),
                'last_page'    => $negocios->lastPage(),
                'from'         => $negocios->firstItem(),
                'to'           => $negocios->lastItem(),
            ],
            'negocios' => $negocios,
            'lobo' => $lobo
        ];
        
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $estad = $request->estad;

        if($estad == 'Comprador' || $estad == 'Negociacion' ){
        $negocio = Negociacion::join('telefonos','negociacions.idtelefono','=','telefonos.id')     
        ->select('negociacions.id','negociacions.idtelefono','negociacions.nombreCliente',
        'negociacions.telefonoCliente','telefonos.nombre as nombre_telefono','telefonos.precio','telefonos.color as colortel','negociacions.nombreTel',
        'negociacions.ci','negociacions.marca','negociacions.color','negociacions.correo','negociacions.descripcion',
        'negociacions.imagen','negociacions.created_at','negociacions.condicion','negociacions.estado')
        ->where('negociacions.id','=',$id)
        ->orderBy('negociacions.id', 'desc')->take(1)->get();
        }else if($estad =='Vendedor'|| $estad == 'Registrado'){
        $negocio = Negociacion::select('negociacions.id','negociacions.idtelefono','negociacions.nombreCliente',
        'negociacions.telefonoCliente','negociacions.nombreTel',
        'negociacions.ci','negociacions.marca','negociacions.color','negociacions.correo','negociacions.descripcion',
        'negociacions.imagen','negociacions.created_at','negociacions.condicion','negociacions.estado')
        ->where('negociacions.id','=',$id)
        ->orderBy('negociacions.id', 'desc')->take(1)->get();
        }
         
        return [
           
            'negocio' => $negocio
        ];
    }
    public function buscarfecha(Request $request){
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->fecha;

            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('sucursals','articulos.idsucursal','=','sucursals.id')
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('personas','articulos.idpersona','=','personas.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idsucursal','articulos.idmarca','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','sucursals.nombre as nombre_sucursal','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','articulos.created_at','articulos.descripcion','personas.nombre as nomp','articulos.condicion')
            ->where('articulos.stock','>',0)
            ->whereDate('articulos.created_at',$buscar)
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
            'articulos' => $articulos
        ];

    }
    
    public function store(Request $request)
    {
        //dd($request->id);
        $negocio = new Negociacion();
        if($request->imagen && $request->id>0){
            if($request->hasFile('imagen')){
                $file = $request->file('imagen');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/imagesNegociar/', $name);
            }
            $negocio->estado = 'Negociacion';
            $negocio->imagen = $name;
            $negocio->idtelefono = $request->id;
            }else if(!$request->imagen && $request->id>0){
            $negocio->imagen ='ninguna';
            $negocio->estado = 'Comprador';
            $negocio->idtelefono = $request->id;
            }else if($request->imagen && $request->id==0){
                if($request->hasFile('imagen')){
                    $file = $request->file('imagen');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/imagesNegociar/', $name);
                }
                $negocio->estado = 'Vendedor';
                $negocio->imagen = $name;   
            }
        
        $negocio->marca = $request->input('marca');
        $negocio->nombreCliente = $request->input('nombreCliente');
        $negocio->telefonoCliente = $request->input('telefonoCliente');
        $negocio->nombreTel = $request->input('nombreTel');
        $negocio->ci = '0000';
        $negocio->color = $request->input('color');
        $negocio->correo = $request->input('correo');
        $negocio->descripcion = $request->input('descripcion');
        $negocio->condicion = $request->input('condicion');
        $negocio->save();
        return redirect('/');
    }

    

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $telefono = Telefono::findOrFail($request->id);
        $telefono->estado = 'Inactivo';
        $telefono->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $telfono = Telefono::findOrFail($request->id);
        $telfono->estado = 'Activo';
        $telfono->save();
    }
    public function imagen(Request $request){
        if (!$request->ajax()) return redirect('/');
        $telefono=new Telefono;
        $telefono->nombre='Y12';
        $telefono->idcategoria=1;
        $telefono->idmarca=1;
        if ($request->image) {
            $logo = $request->image;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = str_random(20).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen = $logoName;
        }
        else {
            $telefono->imagen = "ninguna"; 
        }
        $telefono->save();
    }
    public function delantero(Request $request)
    {
        $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
            ->join('marcas','telefonos.idmarca','=','marcas.id')
            ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
            ->where('telefonos.estado','=','Activo')
            ->orderBy('telefonos.id', 'desc')->paginate(20);
        return view('telefonos.telefonos', compact('telefonos'));
    }
    public function mostrarDetalle($id){
                
        $telefono = Telefono::find($id);
        
        return view('cel', compact('telefono'));
    }
    public function registro(Request $request){

        //if (!$request->ajax()) return redirect('/');
        $negocio = Negociacion::findOrFail($request->idc);
        $negocio->estado = 'Registrado';
        $negocio->save();
        
    }
    public function eliminar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $negocio = Negociacion::findOrFail($request->id);
        $negocio->estado = 'Eliminado';
        $negocio->save();
    }
}
