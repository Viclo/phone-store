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
                        <i class="fa fa-align-justify"></i> Devoluciones
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="0">Ingresar</option>
                                      <option value="nombre">Nombre</option>
                                      <option value="codigo">Codigo</option>
                                      <option value="fechaA">Fecha de Devolucion</option>
                                      <option value="proveedor">Proveedor</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarArticulo(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarArticulo(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                         <table class="table table-responsive table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Sucursal</th>
                                    <th>Marca</th>
                                    <th>Precio Venta</th>
                                    <th>Precio Compra</th>
                                    <th>Stock</th>
                                    <th>Proveedor</th>
                                    <th>Fecha de Devolucion</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="articulo in arrayDevolucion" :key="articulo.id">
                                    
                                    <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.nombre_categoria"></td>
                                    <td v-text="articulo.nombre_sucursal"></td>
                                    <td v-text="articulo.nombre_marca"></td>
                                    <td v-text="articulo.precio_venta"></td>        
                                    <td >{{articulo.precio_compra}}</td>
                                    <td v-text="articulo.stock"></td>
                                    <td v-text="articulo.proveedor"></td>
                                    <td v-text="articulo.fechaA" ></td>
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
                        </table>
                       
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
                arrayDevolucion : [],
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
            
            
            
        },
        methods : {
            listarArticulo (page,buscar,criterio){
                let me=this;
                var url= '/devol?buscar='+ buscar + '&criterio='+ criterio; 
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayDevolucion = respuesta.devoluciones.data;
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
