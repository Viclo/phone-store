<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Telefono;
use App\Marca;
use DB;

class TelefonoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $lobo = \Auth::user()->idrol;
         
        
        if ($buscar==''){
            $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
            ->join('marcas','telefonos.idmarca','=','marcas.id')
            ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.imagen2','telefonos.imagen3','telefonos.imagen4','telefonos.imagen5','telefonos.imagen6','telefonos.precio','telefonos.created_at','telefonos.descripcion','telefonos.estado')
            ->orderBy('telefonos.id', 'desc')->paginate(20);
        }
        else{
            $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
            ->join('marcas','telefonos.idmarca','=','marcas.id')
            ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
            ->where('telefonos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('telefonos.id', 'desc')->paginate(20);
        }

        return [
            'pagination' => [
                'total'        => $telefonos->total(),
                'current_page' => $telefonos->currentPage(),
                'per_page'     => $telefonos->perPage(),
                'last_page'    => $telefonos->lastPage(),
                'from'         => $telefonos->firstItem(),
                'to'           => $telefonos->lastItem(),
            ],
            'telefonos' => $telefonos,
            'lobo' => $lobo
        ];
        
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
        $id = $request->id;
        $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
            ->join('marcas','telefonos.idmarca','=','marcas.id')
            ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.imagen2','telefonos.imagen3','telefonos.imagen4','telefonos.imagen5','telefonos.imagen6','telefonos.precio','telefonos.created_at','telefonos.descripcion','telefonos.estado')
            ->where('telefonos.id',$id)
            ->orderBy('telefonos.id', 'desc')->get();
         
        return ['tele' => $telefonos];
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
        if (!$request->ajax()) return redirect('/');
        $telefono=new Telefono;
        $telefono->nombre=$request->nombre;
        $telefono->idcategoria=$request->idcategoria;
        $telefono->idmarca=$request->idmarca;
        $telefono->pantalla=$request->pantalla;
        $telefono->procesador=$request->procesador;
        $telefono->color=$request->color;
        $telefono->memoria=$request->memoria;
        $telefono->camara=$request->camara;
        $telefono->bateria=$request->bateria;
        $telefono->sistema=$request->sistema;
        $telefono->descripcion=$request->descripcion;
        $telefono->estado='Activo';
        if ($request->image) {
            $logo = $request->image;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen = $logoName;
        }
        else {
            $telefono->imagen = "ninguna";
        };
        if ($request->image2) {
            $logo = $request->image2;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen2 = $logoName;
        }
        else {
            $telefono->imagen2 = "ninguna";
        };
        if ($request->image3) {
            $logo = $request->image3;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen3 = $logoName;
        }
        else {
            $telefono->imagen3 = "ninguna";
        };
        if ($request->image4) {
            $logo = $request->image4;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen4 = $logoName;
        }
        else {
            $telefono->imagen4 = "ninguna";
        };
        if ($request->image5) {
            $logo = $request->image5;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen5 = $logoName;
        }
        else {
            $telefono->imagen5 = "ninguna";
        };
        if ($request->image6) {
            $logo = $request->image6;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen6 = $logoName;
        }
        else {
            $telefono->imagen6 = "ninguna";
        };
        $telefono->precio=$request->precio;
        
        $telefono->save();
    }

    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $telefono=Telefono::findOrFail($request->id);
        $telefono->nombre=$request->nombre;
        $telefono->idcategoria=$request->idcategoria;
        $telefono->idmarca=$request->idmarca;
        $telefono->pantalla=$request->pantalla;
        $telefono->procesador=$request->procesador;
        $telefono->color=$request->color;
        $telefono->memoria=$request->memoria;
        $telefono->camara=$request->camara;
        $telefono->bateria=$request->bateria;
        $telefono->sistema=$request->sistema;
        $telefono->descripcion=$request->descripcion;
        $telefono->estado='Activo';
        if ($request->image && $request->image != $telefono->imagen) {
            $logo = $request->image;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen = $logoName;
        };
        if ($request->image2 && $request->image2 != $telefono->imagen2) {
            $logo = $request->image2;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen2 = $logoName;
        };
        if ($request->image3 && $request->image3 != $telefono->imagen3) {
            $logo = $request->image3;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen3 = $logoName;
        };
        if ($request->image4 && $request->image4 != $telefono->imagen4) {
            $logo = $request->image4;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen4 = $logoName;
        };
        if ($request->image5 && $request->image5 != $telefono->imagen5) {
            $logo = $request->image5;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen5 = $logoName;
        };
        if ($request->image6 && $request->image6 != $telefono->imagen6) {
            $logo = $request->image6;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $telefono->imagen6 = $logoName;
        };
        $telefono->precio=$request->precio;
        $telefono->save();
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
        $buscar = $request->busca;
        $mars  = $request->mari;
            

                if($mars!=''){
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',1)
                ->where('telefonos.idmarca', 'like', '%'. $mars . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                }
            elseif ($buscar==''){
                $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',1)
                ->orderBy('telefonos.id', 'desc')->paginate(20);
            
                
            }
            else{
                
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',1)
                ->where('telefonos.nombre', 'like', '%'. $buscar . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                
            }
            $marcas = Marca::orderBy('id', 'desc')->paginate(20);
        return view('celular.index', compact('telefonos','marcas'));
    }
    public function delanteroWel(Request $request)
    {
        $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
            ->join('marcas','telefonos.idmarca','=','marcas.id')
            ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
            ->where('telefonos.estado','=','Activo')
            ->where('telefonos.idcategoria','=',1)
            ->orderBy('telefonos.id', 'desc')->paginate(20);
        $telefonosof = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
            ->join('marcas','telefonos.idmarca','=','marcas.id')
            ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
            ->where('telefonos.estado','=','Activo')
            ->where('telefonos.idcategoria','=',5)
            ->orderBy('telefonos.id', 'desc')->paginate(20);
        return view('welcome', compact('telefonos','telefonosof'));
    }
    public function mostrarDetalle($id){
                
        $telefono = Telefono::find($id);
        
        return view('work.index', compact('telefono'));
    }

    public function delanteroAcc(Request $request)
    {
        $buscar = $request->busca;
        $mars  = $request->mari;
            

                if($mars!=''){
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',2)
                ->where('telefonos.idmarca', 'like', '%'. $mars . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                }
            elseif ($buscar==''){
                $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',2)
                ->orderBy('telefonos.id', 'desc')->paginate(20);
            
                
            }
            else{
                
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',2)
                ->where('telefonos.nombre', 'like', '%'. $buscar . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                
            }
            $marcas = Marca::orderBy('id', 'desc')->paginate(20);
        return view('accesorio.indexi', compact('telefonos','marcas'));
    }
    public function mostrarDetalleAcc($id){
                
        $telefono = Telefono::find($id);
        
        return view('accesorio.work3', compact('telefono'));
    }
    public function delanteroTab(Request $request)
    {   
        $buscar = $request->busca;
        $mars  = $request->mari;
            

                if($mars!=''){
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',4)
                ->where('telefonos.idmarca', 'like', '%'. $mars . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                }
            elseif ($buscar==''){
                $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',4)
                ->orderBy('telefonos.id', 'desc')->paginate(20);
            
                
            }
            else{
                
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',4)
                ->where('telefonos.nombre', 'like', '%'. $buscar . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                
            }
            $marcas = Marca::orderBy('id', 'desc')->paginate(20);
        return view('tablet.index', compact('telefonos','marcas'));
    }
    public function mostrarDetalleTab($id){
                
        $telefono = Telefono::find($id);
        
        return view('tablet.work2', compact('telefono'));
    }
    public function delanteroLap(Request $request)
    {   
        $buscar = $request->busca;
        $mars  = $request->mari;
            

                if($mars!=''){
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',3)
                ->where('telefonos.idmarca', 'like', '%'. $mars . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                }
            elseif ($buscar==''){
                $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',3)
                ->orderBy('telefonos.id', 'desc')->paginate(20);
            
                
            }
            else{
                
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',3)
                ->where('telefonos.nombre', 'like', '%'. $buscar . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                
            }
            $marcas = Marca::orderBy('id', 'desc')->paginate(20);
        return view('laptop.index', compact('telefonos','marcas'));
    }
    public function mostrarDetalleLap($id){
                
        $telefono = Telefono::find($id);
        
        return view('laptop.work4', compact('telefono'));
    }
    public function delanteroOf(Request $request)
    {   
        $buscar = $request->busca;
        $mars  = $request->mari;
            

                if($mars!=''){
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',5)
                ->where('telefonos.idmarca', 'like', '%'. $mars . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                }
            elseif ($buscar==''){
                $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',5)
                ->orderBy('telefonos.id', 'desc')->paginate(20);
            
                
            }
            else{
                
                    $telefonos = Telefono::join('categorias','telefonos.idcategoria','=','categorias.id')   
                ->join('marcas','telefonos.idmarca','=','marcas.id')
                ->select('telefonos.id','telefonos.idcategoria','telefonos.idmarca','telefonos.nombre','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca','telefonos.pantalla','telefonos.procesador','telefonos.memoria','telefonos.bateria','telefonos.sistema','telefonos.color','telefonos.camara','telefonos.imagen','telefonos.created_at','telefonos.descripcion','telefonos.estado')
                ->where('telefonos.estado','=','Activo')
                ->where('telefonos.idcategoria','=',5)
                ->where('telefonos.nombre', 'like', '%'. $buscar . '%')
                ->orderBy('telefonos.id', 'desc')->paginate(20);
                
            }
            $marcas = Marca::orderBy('id', 'desc')->paginate(20);

        return view('oferta.index', compact('telefonos','marcas'));
    }
    public function mostrarDetalleOf($id){
                
        $telefono = Telefono::find($id);
        
        return view('oferta.work1', compact('telefono'));
    }
}
