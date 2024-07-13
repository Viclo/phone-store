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
                        <i class="fa fa-align-justify"></i> Telefonos
                        <button type="button" @click="mostrarDetalle" class="btn btn-secondary">Agregar Telefono</button>
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
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Marca</th>
                                    <th>Pantalla</th>
                                    <th>Procesador</th>
                                    <th>Memoria</th>
                                    <th>Bateria</th>
                                    <th>Sistema Operativo</th>
                                    <th>Imagen</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="telefono in arrayTelefono" :key="telefono.id">
                                    <td>
                                        <button type="button" @click="verTelefono(telefono.id)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="telefono.estado=='Activo'">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarTelefono(telefono.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-if="telefono.estado=='Inactivo'">
                                            <button type="button" class="btn btn-info btn-sm" @click="activarTelefono(telefono.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                        
                                    </td> 
                                    <td v-text="telefono.nombre"></td>
                                    <td v-text="telefono.nombre_categoria"></td>
                                    <td v-text="telefono.nombre_marca"></td>
                                    <td v-text="telefono.pantalla"></td>
                                    <td v-text="telefono.procesador"></td>
                                    <td v-text="telefono.memoria"></td>
                                    <td v-text="telefono.bateria"></td>
                                    <td v-text="telefono.sistema"></td>
                                    <td><img v-bind:src="telefono.imagen" class="img-responsive" width="100" height="100"></td>
                                    <td v-text="telefono.created_at"></td>
                                    <td v-text="telefono.estado"></td>
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
                            <template v-if="idcategoria==1">   
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
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            
                             <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img :src="image" width="300" height="300" >
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                           </template>
                           <template v-else-if="idcategoria==2">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Del Accesorio</label>
                                    <input type="text" class="form-control" v-model="telnom">
                                </div>
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" class="form-control" v-model="descripcion">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img :src="image" width="300" height="300" >
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                           </template>
                           <template v-if="idcategoria==4">   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Tablet</label>
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
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            
                             <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img :src="image" width="300" height="300" >
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                           </template>
                           <template v-else-if="idcategoria==5">   
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
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Precio al publico</label>
                                    <input type="text" class="form-control" v-model="precio">
                                </div>
                            </div>
                            
                             <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image" width="300" height="300" >
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image2" width="300" height="300">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image3" width="300" height="300">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange3" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image4" width="300" height="300">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange4" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image5" width="300" height="300">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange5" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image6" width="300" height="300">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange6" class="form-control">
                                    </div>
                                </div>
                           </template>
                            <template v-if="idcategoria==3">   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Laptop</label>
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
                                    <label>Ram</label>
                                    <input type="text" class="form-control" v-model="memoria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Disco Duro</label>
                                    <input type="text" class="form-control" v-model="bateria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sistema Operativo</label>
                                    <select class="form-control" v-model="sistema">
                                        <option value="0">Seleccione</option>
                                        <option value="Linux">Linux</option>
                                        <option value="MAC">Mac</option>
                                        <option value="WINDOWS">Windows</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tarjeta de video</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            
                             <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img :src="image" width="300" height="300" >
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                           </template>
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
                            <template v-if="idcategoria==1">
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
                                    <input type="text" class="form-control" v-model="color" v-bind:style="{ backgroundColor: color}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                            </template>
                            <template v-else-if="idcategoria==2">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Del Accesorio</label>
                                    <input type="text" class="form-control" v-model="telnom">
                                </div>
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" class="form-control" v-model="descripcion">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                            </template>
                            <template v-if="idcategoria==4">   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Tablet</label>
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
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
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
                           </template>
                            <template v-else-if="idcategoria==5">   
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
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Camara</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Precio al publico</label>
                                    <input type="text" class="form-control" v-model="precio">
                                </div>
                            </div>
                             <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image2" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image3" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange3" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image4" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange4" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image5" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange5" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image6" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange6" class="form-control">
                                    </div>
                                </div>
                           </template>
                           <template v-if="idcategoria==3">   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Laptop</label>
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
                                    <label>Ram</label>
                                    <input type="text" class="form-control" v-model="memoria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Disco Duro</label>
                                    <input type="text" class="form-control" v-model="bateria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sistema Operativo</label>
                                    <select class="form-control" v-model="sistema">
                                        <option value="0">Seleccione</option>
                                        <option value="Linux">Linux</option>
                                        <option value="MAC">Mac</option>
                                        <option value="WINDOWS">Windows</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" class="form-control" v-model="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tarjeta de video</label>
                                    <input type="text" class="form-control" v-model="camara">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <label for="">Imagen</label>
                                    <div class="col-md-4">
                                        <img :src="image" class="img-responsive">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
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
                           </template>
                             <!--<div class="col-md-12">
                                 <label for="">Imagen</label>
                                <div class="col-md-2">
                                    <img :src="image" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <input type="file" v-on:change="onFileChange" class="form-control">
                                </div>
                            </div>-->
                           
                                <!--<div class="col-md-4">
                                    <label for="">Imagen</label>
                                    <div class="col-md-2">
                                        <img v-bind:src="image" class="img-responsive">
                                    </div>
                                </div>-->
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                                <button type="button" @click="actualizarTelefono()" class="btn btn-primary">Actualizarr</button>
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
                telefono_id: 0,
                idcategoria : 0,
                nombre_categoria : '',
                idmarca : 0,
                nombre_marca : '',
                telnom : '',
                pantalla : '',
                procesador : '',
                memoria : '',
                bateria : '',
                sistema : 'Android',
                color : '',
                image: '',
                image2: '',
                image3: '',
                image4: '',
                image5: '',
                image6: '',
                camara:'',
                precio:'',
                listado:1,
                descripcion : '',
                arrayTelefono : [],
                arrayTelT: [],
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
                var url= '/telefono?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio; 
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayTelefono = respuesta.telefonos.data;
                    me.lobo = respuesta.lobo;
                    console.log(me.lobo);
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
                    'precio': this.precio,
                    'procesador': this.procesador,
                    'memoria': this.memoria,
                    'bateria': this.bateria,
                    'sistema': this.sistema,
                    'color': this.color,
                    'image': this.image,
                    'image2': this.image2,
                    'image3': this.image3,
                    'image4': this.image4,
                    'image5': this.image5,
                    'image6': this.image6,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.listado=1;
                    me.listarArticulo(1,'','nombre');
                    me.image='';
                    me.image2='';
                    me.image3='';
                    me.image4='';
                    me.image5='';
                    me.image6='';
                    me.idcategoria=0;
                    me.idmarca=0;
                    me.telnom='';
                    me.pantalla='';
                    me.camara='';
                    me.precio='';
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
            verTelefono(id){
                let me=this;
                me.listado=2;
                var arrayTelT=[];
                var url= '/telefono/obtenerCabecera?id=' + id;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    arrayTelT = respuesta.tele;
                    
                    me.telefono_id = arrayTelT[0]['id'];
                    me.idcategoria= arrayTelT[0]['idcategoria'];
                    me.idmarca= arrayTelT[0]['idmarca'];
                    me.telnom = arrayTelT[0]['nombre'];
                    me.image=arrayTelT[0]['imagen'];
                    me.image2=arrayTelT[0]['imagen2'];
                    me.image3=arrayTelT[0]['imagen3'];
                    me.image4=arrayTelT[0]['imagen4'];
                    me.image5=arrayTelT[0]['imagen5'];
                    me.image6=arrayTelT[0]['imagen6'];
                    me.pantalla=arrayTelT[0]['pantalla'];
                    me.camara=arrayTelT[0]['camara'];
                    me.precio=arrayTelT[0]['precio'];
                    me.procesador=arrayTelT[0]['procesador'];
                    me.memoria=arrayTelT[0]['memoria'];
                    me.bateria=arrayTelT[0]['bateria'];
                    me.sistema=arrayTelT[0]['sistema'];
                    me.color=arrayTelT[0]['color'];
                    me.descripcion=arrayTelT[0]['descripcion'];
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
                this.selectCategoria();
                this.selectMarca();

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
                    'precio': this.precio,
                    'procesador': this.procesador,
                    'memoria': this.memoria,
                    'bateria': this.bateria,
                    'sistema': this.sistema,
                    'color': this.color,
                    'image': this.image,
                    'image2': this.image2,
                    'image3': this.image3,
                    'image4': this.image4,
                    'image5': this.image5,
                    'image6': this.image6,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.listado=1;
                    me.listarArticulo(1,'','nombre');
                    me.telefono_id=0;
                    me.image='';
                    me.image2='';
                    me.image3='';
                    me.image4='';
                    me.image5='';
                    me.image6='';
                    me.idcategoria=0;
                    me.idmarca=0;
                    me.telnom='';
                    me.pantalla='';
                    me.camara='';
                    me.precio='';
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
                    this.telefono_id=0;
                    this.image='';
                    this.image2='';
                    this.image3='';
                    this.image4='';
                    this.image5='';
                    this.image6='';
                    this.idcategoria=0;
                    this.idmarca=0;
                    this.telnom='';
                    this.pantalla='';
                    this.camara='';
                    this.precio='';
                    this.procesador='';
                    this.memoria='';
                    this.bateria='';
                    this.sistema='Android';
                    this.color='';
                    this.descripcion='';
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
            onFileChange2(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage2(files[0]);
            },
            createImage2(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image2 = e.target.result;
                };
                reader.readAsDataURL(file); 
            },
            onFileChange3(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage3(files[0]);
            },
            createImage3(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image3 = e.target.result;
                };
                reader.readAsDataURL(file); 
            },
            onFileChange4(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage4(files[0]);
            },
            createImage4(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image4 = e.target.result;
                };
                reader.readAsDataURL(file); 
            },
            onFileChange5(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage5(files[0]);
            },
            createImage5(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image5 = e.target.result;
                };
                reader.readAsDataURL(file); 
            },
            onFileChange6(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage6(files[0]);
            },
            createImage6(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image6 = e.target.result;
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
