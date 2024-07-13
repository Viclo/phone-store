<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Historial de Movimiento de accesorios
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="0">Ingresar</option>
                                      <option value="nombre">Nombre</option>
                                      <option value="codigo">Codigo</option>
                                      <option value="created_at">Fecha de Ingreso</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarArticulo(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarArticulo(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <template v-if="criterio != 0 && buscar">
                             <h1>Central</h1>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloI" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.cantidad"></td>
                                    <td>Compra</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                             <template>
                               <tbody>
                                <tr v-for="articulo in arrayArticulo" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td>-{{articulo.cantidad}}</td>
                                    <td>Transferencia</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                               <tbody>
                                <tr v-for="articulo in arrayArticulo2" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td>+{{articulo.cantidad}}</td>
                                    <td>Transferencia</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloV" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.cantidad"></td>
                                    <td>Venta</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <tbody>
                                
                                    <tr style="background-color: #CEECF5;">
                                            <td colspan="2" align="right"><strong>Cantidad Total:</strong></td>
                                            <td>{{total=calcularTotalCentral}}</td>
                                        

                                        </tr>
                                                             
                            </tbody> 
                        </table>

                        <!-- Fin de listar central-->
                        <h1>HyperMaxi</h1>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloIH" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.cantidad"></td>
                                    <td>Compra</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloH" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td >-{{articulo.cantidad}}</td>
                                    <td>Transferencia</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloH2" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td>+{{articulo.cantidad}}</td>
                                    <td>Transferencia</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloVH" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.cantidad"></td>
                                    <td>Venta</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <tbody>
                                
                                    <tr style="background-color: #CEECF5;">
                                            <td colspan="2" align="right"><strong>Cantidad Total:</strong></td>
                                            <td>{{totalh=calcularTotalHyper}}</td>
                                        

                                        </tr>
                                                             
                            </tbody> 
                            
                        </table>

                        <!-- Fin de listar Hypermaxi-->
                        <h1>IC Norte</h1>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloIIC" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.cantidad"></td>
                                    <td>Compra</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloIC" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-if="articulo.origen == 'IC Norte'">-{{articulo.cantidad}}</td>
                                    <td v-else-if="articulo.destino == 'IC Norte'">+{{articulo.cantidad}}</td>
                                    <td>Transferencia</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloIC2" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td>+{{articulo.cantidad}}</td>
                                    <td>Transferencia</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            </template>
                            <template>
                                <tbody>
                                <tr v-for="articulo in arrayArticuloVIC" :key="articulo.id">
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.cantidad"></td>
                                    <td>Venta</td>
                                    <td v-text="articulo.fecha_hora"></td>
                                    <td>
                                        <div v-if="articulo.condicion == 1">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 0">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 2">
                                            <span class="badge badge-primary">Devuelto</span>
                                        </div>
                                        <div v-else-if="articulo.condicion == 4">
                                            <span class="badge badge-warning">Ocasional</span>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                            
                            </template>
                            <tbody>
                                
                                    <tr style="background-color: #CEECF5;">
                                            <td colspan="2" align="right"><strong>Cantidad Total:</strong></td>
                                            <td>{{totali=calcularTotalIC}}</td>
                                        

                                        </tr>
                                                             
                            </tbody> 
                            
                        </table>
                        <!-- Fin de listar Ic Note-->
                        </template>
                        <template v-else>
                            <div>
                                <h2>Ingrese el Accesorio que esta buscando.</h2>
                            </div>
                        </template>
                       
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
</template>

<script>
    import vSelect from 'vue-select';
    export default {
        data (){
            return {
                articulo_id: 0,
                idcategoria : 0,
                nombre_categoria : '',
                idsucursal : 0,
                nombre_sucursal : '',
                idmarca : 0,
                nombre_marca : '',
                codigo : '',
                nombre : '',
                precio_venta : 0,
                precio_compra : 0,
                stock : 1,
                descripcion : '',
                arrayArticulo : [],
                arrayArticulo2 : [],
                arrayArticuloI : [],
                arrayArticuloV : [],
                arrayArticuloH : [],
                arrayArticuloH2 : [],
                arrayArticuloIH : [],
                arrayArticuloVH : [],
                arrayArticuloIC : [],
                arrayArticuloIC2 : [],
                arrayArticuloIIC : [],
                arrayArticuloVIC : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorArticulo : 0,
                errorMostrarMsjArticulo : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : '0',
                buscar : '',
                arrayCategoria :[],
                arraySucursal :[],
                arrayMarca :[],
                date: Date,
                lobo: '',
                total:0,
                totalh:0,
                totali:0,
            }
        },
        components: {
            vSelect
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            },
            calcularTotalCentral: function(){
                var resultadoc=0;
                for(var i=0;i<this.arrayArticulo.length;i++){
                    resultadoc= resultadoc - (this.arrayArticulo[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticulo2.length;i++){
                    resultadoc = resultadoc + (this.arrayArticulo2[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloI.length;i++){
                    resultadoc= resultadoc + (this.arrayArticuloI[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloV.length;i++){
                    resultadoc = resultadoc - (this.arrayArticuloV[i].cantidad*1);
                }
                return resultadoc;
                



            },
            calcularTotalHyper: function(){
                var resultadoh=0;
                for(var i=0;i<this.arrayArticuloH.length;i++){
                    resultadoh= resultadoh - (this.arrayArticuloH[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloH2.length;i++){
                    resultadoh = resultadoh + (this.arrayArticuloH2[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloIH.length;i++){
                    resultadoh= resultadoh + (this.arrayArticuloIH[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloVH.length;i++){
                    resultadoh = resultadoh - (this.arrayArticuloVH[i].cantidad*1);
                }
                return resultadoh;
                
            },
            calcularTotalIC: function(){
                var resultadoi=0;
                for(var i=0;i<this.arrayArticuloIC.length;i++){
                    resultadoi= resultadoi - (this.arrayArticuloIC[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloIC2.length;i++){
                    resultadoi = resultadoi + (this.arrayArticuloIC2[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloIIC.length;i++){
                    resultadoi= resultadoi + (this.arrayArticuloIIC[i].cantidad*1);
                }
                for(var i=0;i<this.arrayArticuloVIC.length;i++){
                    resultadoi = resultadoi - (this.arrayArticuloVIC[i].cantidad*1);
                }
                return resultadoi;
            },
        },
        methods : {
            listarArticulo (page,buscar,criterio){
                let me=this;
                var url= '/articuloAcc?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio; 
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos.data;
                    me.arrayArticulo2 = respuesta.articulos2.data;
                    me.arrayArticuloI = respuesta.articulosi.data;
                    me.arrayArticuloV = respuesta.articulosv.data;
                    me.arrayArticuloH = respuesta.articulosh.data;
                    me.arrayArticuloH2 = respuesta.articulosh2.data;
                    me.arrayArticuloIH = respuesta.articulosih.data;
                    me.arrayArticuloVH = respuesta.articulosvh.data;
                    me.arrayArticuloIC = respuesta.articulosic.data;
                    me.arrayArticuloIC2 = respuesta.articulosic2.data;
                    me.arrayArticuloIIC = respuesta.articulosiic.data;
                    me.arrayArticuloVIC = respuesta.articulosvic.data;
                    me.lobo = respuesta.lobo;
                    console.log(me.lobo);
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
                this.selectSucursal();
            },
            selectCategoria(){
                let me=this;
                var url= '/categoria/selectCategoria';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayCategoria = respuesta.categorias;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectSucursal(){
                let me=this;
                var url= '/sucursal/selectSucursal';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arraySucursal = respuesta.sucursals;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectMarca(){
                let me=this;
                var url= '/marca/selectMarca';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayMarca = respuesta.marcas;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarArticulo(page,buscar,criterio);
            },
            
            
        },
        mounted() {
            this.listarArticulo(1,this.buscar,this.criterio);
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }

</style>
