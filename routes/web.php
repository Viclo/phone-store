<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/', 'Auth\LoginController@login')->name('login');
});
Route::get('/', 'TelefonoController@delanteroWel')->name('delantero');//esta linea es subir a cpanel

Route::get('contacto', function () {
    return view('contacto.contact');
});
Route::post('/contactar', 'EmailController@contact')->name('contact');
Route::get('celular', 'TelefonoController@delantero')->name('delantero');
//Route::get('celular', 'MarcaController@mandarMarca')->name('delan');
Route::get('buscar', 'TelefonoController@delantero')->name('delantero');
Route::get('/celular/{id}', 'TelefonoController@mostrarDetalle')->name('detalle');
Route::post('/negociar/{id}', 'NegocioController@store')->name('negociar');
Route::post('/negociar', 'NegocioController@store')->name('negociarven');

Route::get('contacto', function () {
    return view('contacto.contact');
});


Route::get('tableta', 'TelefonoController@delanteroTab')->name('delantero');
Route::get('buscarTab', 'TelefonoController@delanteroTab')->name('delantero');
Route::get('/tabletas/{id}', 'TelefonoController@mostrarDetalleTab')->name('detalle');

Route::get('laptops', 'TelefonoController@delanteroLap')->name('delantero');
Route::get('buscarLap', 'TelefonoController@delanteroLap')->name('delantero');
Route::get('/laptops/{id}', 'TelefonoController@mostrarDetalleLap')->name('detalle');

Route::get('accesorios','TelefonoController@delanteroAcc')->name('delantero');
Route::get('buscarAcc', 'TelefonoController@delanteroAcc')->name('delantero');
Route::get('/accesorios/{id}', 'TelefonoController@mostrarDetalleAcc')->name('detalle');

//Route::get('work3', function () {
  //  return view('accesorio.work3');
//});
Route::get('ofertas','TelefonoController@delanteroOf')->name('delantero');
Route::get('buscarOf','TelefonoController@delanteroOf')->name('delantero');
Route::get('/ofertas/{id}', 'TelefonoController@mostrarDetalleOf')->name('detalle');

Route::get('work1', function () {
    return view('oferta.work1');
});
Route::get('nosotros', function () {
    return view('nosotros.index');
});

Route::get('telefonos', function () {
    return view('telefonos.telefonos');
});
Route::get('work', function () { 
    return view('work.index');
});
Route::get('/telefonos', 'TelefonoController@delantero')->name('delantero');

Route::get('/laptop', 'TelefonoController@delantero')->name('delantero');
Route::get('/tablet', 'TelefonoController@delantero')->name('delantero');
Route::get('/oferta', 'TelefonoController@delantero')->name('delantero');

Route::get('/cel/{id}', 'TelefonoController@mostrarDetalle')->name('detalle');


Route::group(['middleware'=>['auth']],function(){
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard','DashboardController');
    //Notificaciones
    Route::post('/notification/get','NotificationController@get');
    
    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');

    Route::group(['middleware' => ['Almacenero']], function () {
        Route::get('/categoria', 'categoriaController@index');
        Route::post('/categoria/registrar', 'categoriaController@store');
        Route::put('/categoria/actualizar', 'categoriaController@update');
        Route::put('/categoria/desactivar', 'categoriaController@desactivar');
        Route::put('/categoria/activar', 'categoriaController@activar');
        Route::get('/categoria/', 'categoriaController@selectcategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar'); 
        Route::put('/articulo/devolver', 'ArticuloController@devolver');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');
        Route::get('/articulo/excelCel', 'ArticuloController@excel')->name('excel_celulares');
        Route::get('/articulo/excelCelH', 'ArticuloController@excelH')->name('excel_celularesH');
        Route::get('/articulo/excelCelIC', 'ArticuloController@excelIC')->name('excel_celularesIC');
        Route::get('/articulo/excelAccs', 'ArticuloController@excelAccs')->name('excel_accesorios');
        Route::get('/articulo/excelAccsH', 'ArticuloController@excelAccsH')->name('excel_accesoriosH');
        Route::get('/articulo/excelAccsIC', 'ArticuloController@excelAccsIC')->name('excel_accesoriosIC');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/actualizar', 'IngresoController@update');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        Route::get('/ingreso/pdf/{id}', 'IngresoController@pdf')->name('ingreso_pdf');

        Route::get('/transferencia', 'TransferenciaController@index');
        Route::post('/transferencia/registrar', 'TransferenciaController@store');
        Route::post('/transferencia/agregar', 'ArticuloController@agregar'); 
        Route::put('/transferencia/confirmar', 'TransferenciaController@registro');
        Route::put('/transferencia/desactivar', 'TransferenciaController@desactivar');
        Route::put('/transferencia/eliminar', 'TransferenciaController@eliminar');
        Route::get('/transferencia/obtenerCabecera', 'TransferenciaController@obtenerCabecera');
        Route::get('/transferencia/obtenerDetalles', 'TransferenciaController@obtenerDetalles');
        Route::get('/transferencia/pdf/{id}', 'TransferenciaController@pdf')->name('ingreso_pdf');

    });

    Route::group(['middleware' => ['Vendedor']], function () {
        Route::get('/categoria', 'categoriaController@index');
        Route::post('/categoria/registrar', 'categoriaController@store');
        Route::put('/categoria/actualizar', 'categoriaController@update');
        Route::put('/categoria/desactivar', 'categoriaController@desactivar');
        Route::put('/categoria/activar', 'categoriaController@activar');
        Route::get('/categoria/', 'categoriaController@selectcategoria');

        Route::get('/sucursal', 'SucursalController@index');
        Route::post('/sucursal/registrar', 'SucursalController@store');
        Route::put('/sucursal/actualizar', 'SucursalController@update');
        Route::put('/sucursal/desactivar', 'SucursalController@desactivar');
        Route::put('/sucursal/activar', 'SucursalController@activar');
        Route::get('/sucursal/selectSucursal', 'SucursalController@selectSucursal');
        
        Route::get('/marca', 'MarcaController@index');
        Route::post('/marca/registrar', 'MarcaController@store');
        Route::put('/marca/actualizar', 'MarcaController@update');
        Route::put('/marca/desactivar', 'MarcaController@desactivar');
        Route::put('/marca/activar', 'MarcaController@activar');
        Route::get('/marca/selectMarca', 'MarcaController@selectMarca');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::put('/articulo/devolver', 'ArticuloController@devolver');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');
        Route::get('/articulo/excel', 'ArticuloController@excel')->name('articulos_excel');

        Route::get('/transferencia', 'TransferenciaController@index');
        Route::post('/transferencia/registrar', 'TransferenciaController@store');
        Route::post('/transferencia/agregar', 'ArticuloController@agregar');
        Route::put('/transferencia/confirmar', 'TransferenciaController@registro');
        Route::put('/transferencia/desactivar', 'TransferenciaController@desactivar');
        Route::put('/transferencia/eliminar', 'TransferenciaController@eliminar');
        Route::get('/transferencia/obtenerCabecera', 'TransferenciaController@obtenerCabecera');
        Route::get('/transferencia/obtenerDetalles', 'TransferenciaController@obtenerDetalles');
        Route::get('/transferencia/pdf/{id}', 'TransferenciaController@pdf')->name('ingreso_pdf');
        
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/venta/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');
    });
    Route::group(['middleware' => ['Vendedoric']], function () {
        Route::get('/almacen/articulo', function () {
            return view('almacen.articulo.index');
        });
    });

    Route::group(['middleware' => ['Administrador']], function () {
        
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/sucursal', 'SucursalController@index');
        Route::post('/sucursal/registrar', 'SucursalController@store');
        Route::put('/sucursal/actualizar', 'SucursalController@update');
        Route::put('/sucursal/desactivar', 'SucursalController@desactivar');
        Route::put('/sucursal/activar', 'SucursalController@activar');
        Route::get('/sucursal/selectSucursal', 'SucursalController@selectSucursal');
        
        Route::get('/marca', 'MarcaController@index');
        Route::post('/marca/registrar', 'MarcaController@store');
        Route::put('/marca/actualizar', 'MarcaController@update');
        Route::put('/marca/desactivar', 'MarcaController@desactivar');
        Route::put('/marca/activar', 'MarcaController@activar');
        Route::get('/marca/selectMarca', 'MarcaController@selectMarca');

        Route::get('/articulo', 'ArticuloController@index');
        Route::get('/articulo/fecha', 'ArticuloController@buscarFecha');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');
        Route::get('/articulo/excelCel', 'ArticuloController@excel')->name('excel_celulares');
        Route::get('/articulo/excelCelH', 'ArticuloController@excelH')->name('excel_celularesH');
        Route::get('/articulo/excelCelIC', 'ArticuloController@excelIC')->name('excel_celularesIC');
        Route::get('/articulo/excelAccs', 'ArticuloController@excelAccs')->name('excel_accesorios');
        Route::get('/articulo/excelAccsH', 'ArticuloController@excelAccsH')->name('excel_accesoriosH');
        Route::get('/articulo/excelAccsIC', 'ArticuloController@excelAccsIC')->name('excel_accesoriosIC');
        Route::get('/articulo/excelFecha', 'ArticuloController@excelFecha')->name('excel_Fecha');


        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');
        
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        Route::get('/reporte', 'ReportesController@index');
        Route::get('/reporte/meses', 'ReportesController@excelMes');
        Route::get('/reporte/excelVen', 'ReportesController@excel')->name('excel_ventas'); 
        Route::get('/reporte/excelVenHyper', 'ReportesController@excel2')->name('excel_ventas');
        Route::get('/reporte/excelVenIc', 'ReportesController@excel3')->name('excel_ventas');

        Route::get('/reported', 'ReportedController@index');

        Route::get('/articuloAcc', 'HistorialController@index');


        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::put('/venta/actualizar', 'VentaController@update');
        Route::put('/venta/actualizarF', 'VentaController@updateF');
        Route::post('/venta/registrarModoPago', 'ArticuloController@agregarModoPago');
        Route::post('/venta/agregar', 'ClienteController@agregar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/venta/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/selectRol', 'RolController@selectRol');
        
        Route::get('/user', 'UserController@index');
        Route::post('/user/registrar', 'UserController@store');
        Route::put('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');
        Route::get('/user/selectUser', 'UserController@selectUser');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::post('/ingreso/agregar', 'ArticuloController@agregar');
        Route::put('/ingreso/actualizar', 'IngresoController@update'); 
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        Route::get('/ingreso/pdf/{id}', 'IngresoController@pdf')->name('ingreso_pdf');
        
        Route::get('/transferencia', 'TransferenciaController@index');
        Route::post('/transferencia/registrar', 'TransferenciaController@store');
        Route::post('/transferencia/agregar', 'ArticuloController@agregar');
        Route::put('/transferencia/desactivar', 'TransferenciaController@desactivar');
        Route::get('/transferencia/obtenerCabecera', 'TransferenciaController@obtenerCabecera');
        Route::get('/transferencia/obtenerDetalles', 'TransferenciaController@obtenerDetalles');
        Route::get('/transferencia/pdf/{id}', 'TransferenciaController@pdf')->name('ingreso_pdf');

        Route::get('/telefono', 'TelefonoController@index');
        Route::get('/telefono/obtenerCabecera', 'TelefonoController@obtenerCabecera');
        Route::post('/telefono/registrar', 'TelefonoController@store');
        Route::post('/telefono/imagen', 'TelefonoController@imagen');
        Route::put('/telefono/actualizar', 'TelefonoController@update');
        Route::put('/telefono/desactivar', 'TelefonoController@desactivar');
        Route::put('/telefono/activar', 'TelefonoController@activar');
        
        Route::get('/negocio', 'NegocioController@index');
        Route::get('/negocio/obtenerCabecera', 'NegocioController@obtenerCabecera');
        Route::put('/negocio/confirmar', 'NegocioController@registro');
        Route::put('/negocio/eliminar', 'NegocioController@eliminar');

        Route::post('/devol/store', 'DevolucionController@store');
        Route::get('/devol', 'DevolucionController@index');
        
    });

});

//Route::get('/home', 'HomeController@index')->name('home');
