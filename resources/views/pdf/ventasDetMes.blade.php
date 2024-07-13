<table>
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Nro.</th>
        <th>Cliente</th>
        <th>Marca</th>
        <th>Articulo</th>
        <th>Serie</th>
        <th>Costo</th>
        <th>Importe</th>
        <th>Ganancia Bruta</th>
        <!--<th>Ganancia Neta</th>-->
        <th>Parte de Pago</th>
        <th>Impuesto</th>
        <th>Cajero</th>
        <th>Vendedor</th> 
        
    </tr>
    </thead>
    <tbody> 
    @foreach($ventas as $a) 
    @if($a->moneda == 'Bolivianos')
    @for($j=0;$j<$a->cantidad;$j++)
        <tr>
                <td>{{$a->fecha_hora}}</td>
                <td>{{$a->num_comprobante}}</td>
                <td>{{$a->telefono}}-{{$a->nombre}}</td>
                <td>{{$a->nombre_marca}}</td>
                <td>{{$a->articulo}}</td>
                <td>{{$a->codigo}}</td>       
                @if($a->idcategoria == 2)       
                <td>{{$a->precio_compra/6.96}}</td>
                <td>{{((($a->precio)-($a->descuento/$a->cantidad))/(1*1-$a->impuesto))/6.96}}</td>
                <td>{{((($a->precio-$a->descuento/$a->cantidad)/(1-$a->impuesto))-$a->precio_compra)/6.96}}</td>
                <!--<td>{{($a->precio*1-($a->descuento/$a->cantidad)*1-$a->precio_compra)/6.96}}</td>-->
                @for($i=0; $i<count($restas);$i++)
                @if($restas[$i]->idventa==$a->id)
                <td>{{($restas[$i]->sums)/6.96}}</td>
                @break
                @elseif($i == (count($restas)-1))
                <td>0</td>
                @endif
                @endfor
                @else
                <td>{{$a->precio_compra}}</td>
                <td>{{(($a->precio-($a->descuento/6.96))/(1*1-$a->impuesto))}}</td>
                <td>{{((($a->precio-($a->descuento/6.96))/(1-$a->impuesto))-$a->precio_compra)}}</td>
                <!--<td>{{($a->precio*1-($a->descuento*1/6.96)-$a->precio_compra)}}</td>-->
                @for($i=0; $i<count($restas);$i++)
                @if($restas[$i]->idventa==$a->id)
                <td>{{$restas[$i]->sums}}</td>
                @break
                @elseif($i == (count($restas)-1))
                <td>0</td>
                @endif
                @endfor
                @endif
                <td>{{$a->impuesto}}</td>
                <td>{{$a->usuario}}</td>
                <td>{{$a->vendedor}}</td>
            
        </tr>
        @endfor
    @else
    @for($j=0;$j<$a->cantidad;$j++)
    <tr>
        <td>{{$a->fecha_hora}}</td>
        <td>{{$a->num_comprobante}}</td>
        <td>{{$a->telefono}}-{{$a->nombre}}</td>
        <td>{{$a->nombre_marca}}</td>
        <td>{{$a->articulo}}</td>
        <td>{{$a->codigo}}</td>       
        @if($a->idcategoria == 2)       
        <td>{{$a->precio_compra/6.96}}</td>
        <td>{{((($a->precio/6.96)*1-($a->descuento/$a->cantidad))/(1-$a->impuesto))}}</td>
        <td>{{(((($a->precio/6.96)-($a->descuento/$a->cantidad))/(1-$a->impuesto))-($a->precio_compra)/6.96)}}</td>
        <!--<td>{{(($a->precio*1/6.96)-($a->descuento/$a->cantidad)*1-($a->precio_compra/6.96))}}</td>-->
        @for($i=0; $i<count($restas);$i++)
        @if($restas[$i]->idventa==$a->id)
        <td>{{$restas[$i]->sums/6.96}}</td>
        @break
        @elseif($i == (count($restas)-1))
        <td>0</td>
        @endif
        @endfor
        @else
        <td>{{$a->precio_compra}}</td>
        <td>{{($a->precio-$a->descuento)/(1*1-$a->impuesto)}}</td>
        <td>{{((($a->precio-$a->descuento)/(1-$a->impuesto))-$a->precio_compra)}}</td>
        <!--<td>{{($a->precio*1-$a->descuento*1-$a->precio_compra)}}</td>-->
        @for($i=0; $i<count($restas);$i++)
        @if($restas[$i]->idventa==$a->id)
        <td>{{$restas[$i]->sums}}</td>
        @break
        @elseif($i == (count($restas)-1))
        <td>0</td>
        @endif
        @endfor
        @endif
        <td>{{$a->impuesto}}</td>
        <td>{{$a->usuario}}</td>
        <td>{{$a->vendedor}}</td>
    
</tr>
@endfor
    @endif    
    @endforeach
    
    </tbody>
</table>


