<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;
use App\Articulo;

class ArtFechaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function porFecha(int $sucu,int $dia,int $mes,int $anio,int $cat)
    {
        $this->sucu = $sucu;
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
        $this->cat = $cat;
        
        return $this;
    }
    public function view(): View
    {
        return view('pdf.articulos2', [
            'articulos2' => Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('sucursals','articulos.idsucursal','=','sucursals.id') 
            ->join('marcas','articulos.idmarca','=','marcas.id')
            ->join('personas','articulos.idpersona','=','personas.id')
            //->leftjoin('detalle_ventas','detalle_ventas.idarticulo','=','articulos.id')
            //->join('ventas','ventas.id','=','detalle_ventas.idventa')
            ->select('articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','sucursals.nombre as nombre_sucursal','marcas.nombre as nombre_marca','articulos.precio_venta','articulos.precio_compra','articulos.stock','personas.nombre as nomp','articulos.fechaA','articulos.descripcion','articulos.condicion')
            //->where('articulos.stock','>',0)
            ->where('articulos.idsucursal',$this->sucu) 
            //->whereYear('articulos.fechaA', $this->anio)
            //->whereMonth('articulos.fechaA', $this->mes)
            //->whereDay('articulos.fechaA',$this->dia)
            ->where('articulos.fechaA','=',$this->anio."-".$this->mes."-".$this->dia)
            ->where('articulos.condicion','!=',5)
            ->where('articulos.condicion','!=',3)
            ->where('articulos.idcategoria',$this->cat)
            //->where('detalle_ventas.idarticulo',null)
            //->where('ventas.fecha_hora','<=',$this->anio."-".$this->mes."-".$this->dia)
            //->where('ventas.id','=',null)
            ->orderBy('articulos.fechaA', 'desc')->get()
        ]);
    }
}
