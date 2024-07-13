<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif; 
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
 
        #logo{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }
 
        #imagen{
        width: 100px;
        }
 
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
 
        #encabezado{
        text-align: center;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 15px;
        }
 
        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        }
 
        section{
        clear: left;
        }
 
        #cliente{
        text-align: left;
        }
 
        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
 
        #facliente thead{
        padding: 20px;
        background: #2183E3;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facvendedor thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facarticulo thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #gracias{
        text-align: center; 
        }
    </style>
    <body>
        @foreach ($venta as $v)
        <header>
            <div id="logo">
                <img src="img/logo.png" alt="CompartiendoCodigo" id="imagen">
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b>Phonebol</b><br>Cochabamba, Bolivia<br>Telefonos:4450761-67004764-67004763<br>Email: Phonebol@dom.com
                </p>
            </div>
            <div id="fact">
                <p>{{$v->tipo_comprobante}}<br>
                {{$v->serie_comprobante}}-{{$v->num_comprobante}}</p>
            </div>
        </header>
        <br>
        <section>
            <div>
                <table id="facliente">
                    <thead>                        
                        <tr>
                            <th id="fac">Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><p id="cliente">Sr(a). {{$v->nombre}}<br>
                            <!--{{$v->tipo_documento}}: {{$v->num_documento}}<br>-->
                            <!--Dirección: {{$v->direccion}}<br>-->
                            Teléfono: {{$v->telefono}}<br>
                            <!--Email: {{$v->email}}</</p></th>-->
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        @endforeach
        <br>
        <section>
            <div>
                <table id="facvendedor">
                    <thead>
                        <tr id="fv">
                            <th>CAJERO</th>
                            <th>FECHA</th>
                            <th>VENDEDOR</th>
                            <th>MONEDA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$v->usuario}}</td>
                            <td align="center">{{$v->fecha_hora}}</td>
                            <td align="center">{{$v->vendedor}}</td>
                            <td align="center">{{$v->moneda}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <section>
            <div>
                    
                <h2>Productos Vendidos</h2>
                @if($v->moneda == 'Dolares')
                <table id="facarticulo">
                    <thead>
                        <tr id="fa">
                            <th>CANT</th>
                            <th>Marca</th>
                            <th>DESCRIPCION</th>
                            <th>Codigo</th>
                            
                            
                            <th>PRECIO TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <?php If ($det->estado == "0")
                            {
                            ?>
                        <tr>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->nombre_marca}}</td>
                            <td>{{$det->articulo}}</td>
                            <td>{{$det->codigo}}</td>
                            <td>@if($det->idcategoria == 1 || $det->idcategoria == 3)
                                    {{$det->cantidad*$det->precio-$det->descuento}}
                                    @else
                                    {{$det->cantidad*($det->precio/6.96)-$det->descuento}}
                                    @endif
                            </td>
                        </tr>
                        <?php }?>
                        @endforeach
                    </tbody>
                </table>
                @else
                <table id="facarticulo">
                        <thead>
                            <tr id="fa">
                                <th>CANT</th>
                                <th>Marca</th>
                                <th>DESCRIPCION</th>
                                <th>Codigo</th>
                                
                                
                                <th>PRECIO TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $det)
                            <?php If ($det->estado == "0")
                                {
                                ?>
                            <tr>
                                <td>{{$det->cantidad}}</td>
                                <td>{{$det->nombre_marca}}</td>
                                <td>{{$det->articulo}}</td>
                                <td>{{$det->codigo}}</td>
                                
                                
                                <td>@if($det->idcategoria == 2)
                                    {{$det->cantidad*$det->precio-$det->descuento}}
                                    @else
                                    {{$det->cantidad*($det->precio*6.96)-$det->descuento}}
                                    @endif
                                </td>
                            </tr>
                            <?php }?>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                    <h2>Productos en forma de pago</h2>
                    
                    <table id="facarticulo">
                            <thead>
                                <tr id="fa">
                                    <th>CANT</th>
                                    <th>Marca</th>
                                    <th>DESCRIPCION</th>
                                    <th>Codigo</th>
                                    
                                    
                                    <th>PRECIO TOTAL</th>
                                </tr>
                            </thead>
                            @if($v->moneda == 'Dolares')
                            <tbody>
                                @foreach ($detalles as $det)
                                <?php If ($det->estado == "1")
                                    {
                                    ?>
                                <tr>
                                    <td>{{$det->cantidad}}</td>
                                    <td>{{$det->nombre_marca}}</td>
                                    <td>{{$det->articulo}}</td>
                                    <td>{{$det->codigo}}</td>
                                    
                                    
                                    <td>@if($det->idcategoria == 1 || $det->idcategoria == 3)
                                        -{{$det->cantidad*$det->precio-$det->descuento}}
                                        @else
                                        -{{$det->cantidad*($det->precio/6.96)-$det->descuento}}
                                        @endif
                                    </td>
                                </tr>
                                <?php }?>
                                @endforeach
                            </tbody>
                            @else
                            <tbody>
                                    @foreach ($detalles as $det)
                                    <?php If ($det->estado == "1")
                                        {
                                        ?>
                                    <tr>
                                        <td>{{$det->cantidad}}</td>
                                        <td>{{$det->articulo}}</td>
                                        <td>{{$det->codigo}}</td>
                                        
                                        <td>@if($det->idcategoria == 2)
                                            -{{$det->cantidad*$det->precio-$det->descuento}}
                                            @else
                                            -{{$det->cantidad*($det->precio*6.96)-$det->descuento}}
                                            @endif
                                        </td>
                                    </tr>
                                    <?php }?>
                                    @endforeach
                                </tbody>
                            @endif
                    <tfoot>
                        @foreach ($venta as $v)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th> 
                            <th></th>
                            <th>SUBTOTAL</th>
                            <td>$ {{round($v->total,2)}}</td>
                        </tr>
                         <!--<tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Impuesto</th>
                            <td>$ {{round($v->total*$v->impuesto,2)}}</td>
                        </tr>-->
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>TOTAL</th>
                            <td>$ {{round(($v->total/(1-$v->impuesto)),2)}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            @foreach ($venta as $v)
            @if($v->estado=='Endeuda')
            <h2>Nota.- Debe {{(($v->total*1)+((($v->total/(1-$v->impuesto))-$v->total)*1))-($v->pago1)-($v->pago2)}} $</h2>
            <h2>{{$v->nota}}</h2>
            @endif
            @endforeach
            
            <div id="gracias">
                <p><b>Gracias por su compra!</b></p>
            </div>
        </footer>
    </body>
</html>