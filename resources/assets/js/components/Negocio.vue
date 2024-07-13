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
                        <i class="fa fa-align-justify"></i> Negociacion
                    </div>
                    <template v-if="listado==1">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="nombre_marca">Marca</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarArticulo(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarArticulo(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre del Cliente</th>
                                    <th>Correo del Cliente</th>
                                    <th>Telefono del Cliente</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="negocio in arrayNegocio" :key="negocio.id">
                                    <td>
                                        <button type="button" @click="verNegociacion(negocio.id,negocio.estado)" class="btn btn-success btn-sm">
                                            <i class="icon-eye"></i>
                                            </button> &nbsp;
                                            
                                            <template v-if="negocio.estado=='Registrado'">
                                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarTransferencia(transferencia.id)">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else-if="negocio.estado!='Registrado'">
                                                
                                                <button type="button" class="btn btn-info btn-sm" @click="agregarNegocio(negocio,negocio.id)">
                                                    <i class="icon-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" @click="eliminarNegocio(negocio.id)">
                                                    <i class="icon-close"></i>
                                                </button>
                                                
                                            </template>
                                        
                                    </td> 
                                    <td v-text="negocio.nombreCliente"></td>
                                    <td v-text="negocio.correo"></td>
                                    <td v-text="negocio.telefonoCliente"></td>
                                    <td v-text="negocio.created_at"></td>
                                    <td v-text="negocio.estado"></td>
                                </tr>                                
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    </template>
                    <!--inicio del registro de telefonos-->
                    <template v-else-if="listado==0">
                    <div class="car-body">
                        <div class="form-group row border">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Del Telefono</label>
                                    <input type="text" class="form-control" v-model="telnom">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Pantalla</label>
                                <input type="text" class="form-control" v-model="pantalla">
                            </div>
                            <div class="col-md-3">
                                <label for="">Procesador</label>
                                <input type="text" class="form-control" v-model="procesador">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Memoria</label>
                                    <input type="text" class="form-control" v-model="memoria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bateria</label>
                                    <input type="text" class="form-control" v-model="bateria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sistema Operativo</label>
                                    <select class="form-control" v-model="sistema">
                                        <option value="0">Seleccione</option>
                                        <option value="ANDROID">Android</option>
                                        <option value="IOS">IOS</option>
                                        <option value="WINDOWS">Windows</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Categoria</label>
                                        <select class="form-control" v-model="idcategoria">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                        </select>                                        
                            </div>
                            <div class="col-md-12">
                                <label>Marca</label>
                                        <select class="form-control" v-model="idmarca">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="marca in arrayMarca" :key="marca.id" :value="marca.id" v-text="marca.nombre"></option>
                                        </select>                                        
                            </div>
                             <!--<div class="col-md-12">
                                 <label for="">Imagen</label>
                                <div class="col-md-2">
                                    <img :src="image" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <input type="file" v-on:change="onFileChange" class="form-control">
                                </div>
                            </div>-->
                           
                                <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img :src="image" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                                <button type="button" @click="registrarTelefono()" class="btn btn-primary">Registrar</button>
                            </div>

                        </div>
                    </div>
                    </template>
                    <template v-else-if="listado==2">
                    <div class="car-body">
                        <div class="form-group row border">
                            <div class="col-md-12">
                                <h2>Informacion del Cliente</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Del Cliente</label>
                                    <p v-text="nombreCliente"></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Telefono del Cliente</label>
                                <p v-text="telefonoCliente"></p>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Correo Electronico</label>
                                    <p v-text="correo"></p>
                                </div>
                            </div>
                            
                            <template v-if="estado=='Negociacion' || estado=='Comprador'">
                                <div class="col-md-12">
                                <h2>Datos de nuestro Catalogo</h2>
                                </div>
                                <div class="col-md-4">
                                <label for="">Telefono que quiero</label>
                                <p v-text="nombre_telefono"></p>
                            </div>
                            <div class="col-md-4">
                                <label for="">Precio del telefono</label>
                                <p>{{precio}} $us</p>
                            </div>
                            <div class="col-md-4">
                                <label for="">Color Del Celular que Quiero</label>
                                <p v-text="colortel" v-bind:style="{ backgroundColor: colortel}"></p>
                            </div>
                            </template>
                            
                            
                            <template v-if="estado=='Negociacion'|| estado=='Vendedor'">
                                <div class="col-md-12">
                                <h2>Datos de su Dispositivo</h2>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color Del Celular que Doy</label>
                                    <p v-text="color" v-bind:style="{ backgroundColor: color}"></p>
                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <p v-text="marca"></p>
                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefono que Doy</label>
                                    <p v-text="nombreTel"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Descripcion</label>
                                <p v-text="descripcion"></p>                                     
                            </div>
                            <div class="col-md-4">
                                <label>Condicion</label>
                                <p>{{condicion}}/10</p>                                     
                            </div>
                            <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img v-bind:src="'/imagesNegociar/' + imagen" class="img-responsive">
                                    </div>
                            </div>
                            </template>
                            <!--<div class="col-md-4">
                                <div class="form-group">
                                    <label>Doumento de Identidad</label>
                                    <p v-text="ci"></p>
                                </div>
                            </div>-->
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                            </div>

                        </div>
                    </div>
                    </template>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
</template>

<script>
    import VueBarcode from 'vue-barcode';
    export default {
        data (){
            return {
                negocio_id: 0,
                idtelefono : 0,
                nombre_telefono : '',
                nombreCliente : '',
                telefonoCliente : '',
                nombreTel : '',
                ci : '',
                marca : '',
                color : '',
                correo : '',
                image: '',
                descripcion:'',
                condicion:'',
                estado: '',
                listado:1,
                arrayNegocio : [],
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
                criterio : 'nombre',
                buscar : '',
                arrayCategoria :[],
                arrayMarca :[],
                precio:'',
                colortel:'',
            }
        },
        components: {
        'barcode': VueBarcode
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

            }
        },
        methods : {
            
            listarArticulo (page,buscar,criterio){
                let me=this;
                var url= '/negocio?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio; 
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayNegocio = respuesta.negocios.data;
                    me.lobo = respuesta.lobo;
                    //console.log(me.lobo);
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
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
            registrarTelefono(){
                let me = this;
                axios.post('/telefono/registrar',{

                    'idcategoria': this.idcategoria,
                    'idmarca': this.idmarca,
                    'nombre': this.telnom,
                    'pantalla': this.pantalla,
                    'camara': this.camara,
                    'procesador': this.procesador,
                    'memoria': this.memoria,
                    'bateria': this.bateria,
                    'sistema': this.sistema,
                    'color': this.color,
                    'image': this.image,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.ocultarDetalle();
                    me.listarArticulo(1,'','nombre');
                    me.image='';
                    me.idcategoria=0;
                    me.idmarca=0;
                    me.telnom='';
                    me.pantalla='';
                    me.camara='';
                    me.procesador='';
                    me.memoria='';
                    me.bateria='';
                    me.sistema='Android';
                    me.color='';
                    me.descripcion='';

                }).catch(function (error) {
                    console.log(error);
                });
            },
            verNegociacion(id,estad){
                let me=this;
                me.listado=2;

                //Obtener datos del ingreso
                var arrayNegocioT=[];
                var url= '/negocio/obtenerCabecera?id=' + id +'&estad=' + estad;

                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    arrayNegocioT = respuesta.negocio;
                    
                    me.nombreCliente = arrayNegocioT[0]['nombreCliente'];
                    me.telefonoCliente=arrayNegocioT[0]['telefonoCliente'];
                    me.nombre_telefono=arrayNegocioT[0]['nombre_telefono'];
                    me.nombreTel=arrayNegocioT[0]['nombreTel'];
                    me.ci=arrayNegocioT[0]['ci'];
                    me.marca=arrayNegocioT[0]['marca'];
                    me.color=arrayNegocioT[0]['color'];
                    me.correo=arrayNegocioT[0]['correo'];
                    me.descripcion=arrayNegocioT[0]['descripcion'];
                    me.imagen=arrayNegocioT[0]['imagen'];
                    me.precio=arrayNegocioT[0]['precio'];
                    me.colortel=arrayNegocioT[0]['colortel'];
                    me.estado=arrayNegocioT[0]['estado'];
                    me.condicion=arrayNegocioT[0]['condicion'];
                })
                .catch(function (error) {
                    console.log(error);
                });

                //obtener datos de los detalles
                 var url= '/transferencia/obtenerDetalles?id=' + id;

                axios.get(url).then(function (response) {
                    console.log(response);
                    var respuesta= response.data;
                    me.arrayDetalle = respuesta.detalles;

                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            actualizarTelefono(){
                let me = this;
                axios.put('/telefono/actualizar',{
                    'id':this.telefono_id,
                    'idcategoria': this.idcategoria,
                    'idmarca': this.idmarca,
                    'nombre': this.telnom,
                    'pantalla': this.pantalla,
                    'camara': this.camara,
                    'procesador': this.procesador,
                    'memoria': this.memoria,
                    'bateria': this.bateria,
                    'sistema': this.sistema,
                    'color': this.color,
                    'image': this.image,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.ocultarDetalle();
                    me.listarArticulo(1,'','nombre');
                    me.telefono_id=0;
                    me.image='';
                    me.idcategoria=0;
                    me.idmarca=0;
                    me.telnom='';
                    me.pantalla='';
                    me.camara='';
                    me.procesador='';
                    me.memoria='';
                    me.bateria='';
                    me.sistema='Android';
                    me.color='';
                    me.descripcion='';

                }).catch(function (error) {
                    console.log(error);
                });
            },
            mostrarDetalle(){
                this.listado=0;
                this.selectCategoria();
                this.selectMarca();
            },
            ocultarDetalle(){
                this.listado=1;
            },
            agregarNegocio(data,id){
                let me = this;
                
                axios.put('/negocio/confirmar',{
                    'idc': data['id']

                }).then(function (response) {
                    me.listado=1;
                    me.listarArticulo(1,'','');
                }).catch(function (error) {
                    console.log(error);
                });

                
            },
            eliminarNegocio(id){
               swal({
                title: 'Esta seguro de Cancelar esta Negociacion?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/negocio/eliminar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo(1,'','');
                        swal(
                        'Eliminado!',
                        'La Negociacion ha sido Rechazada.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            desactivarTelefono(id){
               swal({
                title: 'Esta seguro de desactivar este Telefono?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/telefono/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo(1,'','nombre');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            upload(){
                axios.post('/telefono/imagen',{image: this.image}).then(response => {

                });
            },
            activarTelefono(id){
               swal({
                title: 'Esta seguro de activar este Telefono?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/telefono/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo(1,'','nombre');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            validarArticulo(){
                this.errorArticulo=0;
                this.errorMostrarMsjArticulo =[];

                if (this.idcategoria==0) this.errorMostrarMsjArticulo.push("Seleccione una categoría.");
                if (this.idsucursal==0) this.errorMostrarMsjArticulo.push("Seleccione una sucursal.");
                if (this.idmarca==0) this.errorMostrarMsjArticulo.push("Seleccione una marca.");
                if (!this.nombre) this.errorMostrarMsjArticulo.push("El nombre del artículo no puede estar vacío.");
                if (!this.stock) this.errorMostrarMsjArticulo.push("El stock del artículo debe ser un número y no puede estar vacío.");
                if (!this.precio_venta) this.errorMostrarMsjArticulo.push("El precio venta del artículo debe ser un número y no puede estar vacío.");

                if (this.errorMostrarMsjArticulo.length) this.errorArticulo = 1;

                return this.errorArticulo;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.idcategoria= 0;
                this.idsucursal= 0;
                this.idmarca= 0;
                this.nombre_categoria = '';
                this.codigo = '';
                this.nombre = '';
                this.precio_venta = 0;
                this.precio_compra = 0;
                this.stock = 1;
                this.descripcion = '';
		        this.errorArticulo=0;
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "articulo":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                
                                this.modal = 1;
                                this.tituloModal = 'Registrar Artículo';
                                this.idcategoria=0;
                                this.idsucursal=0;
                                this.idmarca=0;
                                this.nombre_categoria='';
                                this.nombre_sucursal='';
                                this.codigo='';
                                this.nombre= '';
                                this.precio_venta=0;
                                this.precio_compra=0;
                                this.stock=1;
                                this.descripcion = '';
                                this.tipoAccion = 1;
                                break;
                                //console.log(data);
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Artículo';
                                this.tipoAccion=2;
                                this.articulo_id=data['id'];
                                this.idcategoria=data['idcategoria'];
                                this.idsucursal=data['idsucursal'];
                                this.idmarca=data['idmarca'];
                                this.codigo=data['codigo'];
                                this.nombre = data['nombre'];
                                this.stock=data['stock'];
                                this.precio_venta=data['precio_venta'];
                                this.precio_compra=data['precio_compra'];
                                this.descripcion= data['descripcion'];
                                break;
                            }
                        }
                    }
                }
                this.selectCategoria();
                this.selectMarca();
            }
        },
        
        mounted() {
            this.listarArticulo(1,this.buscar,this.criterio);
        }
    }
</script>
<style scoped>    
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
    @media (min-width: 600px){
        .btnagregar{
            margin-top:2rem;
        }
    }
    img{
        max-height: 36px;
    }
</style>
<style scoped>
    img{
        max-height: 500px;
    }
</style>
