    @extends('principal')
    @section('contenido')

    @if(Auth::check())
            @if (Auth::user()->idrol == 1)
            <template v-if="menu==0">
                <dashboard></dashboard>
            </template>

            <template v-if="menu==1">
                <categoria></categoria>
            </template>

            <template v-if="menu==2">
                <articulo></articulo>
            </template>

            <template v-if="menu==3">
                <ingreso ></ingreso>
            </template>

            <template v-if="menu==4">
                <proveedor></proveedor>
            </template>

            <template v-if="menu==5">
                <venta></venta>
            </template>

            <template v-if="menu==6">
                <cliente></cliente>
            </template>

            <template v-if="menu==7">
                <user></user>
            </template>

            <template v-if="menu==8">
                <rol ></rol>
            </template>

            <template v-if="menu==9">
                <consultaingreso></consultaingreso>
            </template>

            <template v-if="menu==10">
            <consultaventa></consultaventa>
            </template>

            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            <template v-if="menu==13">
                <sucursal></sucursal>
            </template>
            <template v-if="menu==14">
                <marca></marca>
            </template>
            <template v-if="menu==15">
                <transferencia></transferencia>
            </template>
            <template v-if="menu==20">
                <reportes></reportes>
            </template>
            <template v-if="menu==21">
                <telefono></telefono>
            </template>
            <template v-if="menu==22">
                <negocio></negocio>
            </template>
            <template v-if="menu==23">
                <reported></reported>
            </template>
            <template v-if="menu==24">
                <historial></historial>
            </template>
            <template v-if="menu==25">
                <devolucion></devolucion>
            </template>

            @elseif (Auth::user()->idrol == 2)
            <template v-if="menu==13">
                <sucursal></sucursal>
            </template>
            <template v-if="menu==14">
                <marca></marca>
            </template>
            <template v-if="menu==15">
                <transferencia></transferencia>
            </template>
            <template v-if="menu==1">
                <categoria></categoria>
            </template>

            <template v-if="menu==2">
                <articulo></articulo>
            </template>
            <template v-if="menu==0">
                <dashboard></dashboard>
            </template>
            <template v-if="menu==5">
            <venta></venta>
            </template>

            <template v-if="menu==6">
                <cliente></cliente>
            </template>
            <template v-if="menu==10">
            <consultaventa></consultaventa>
            </template>

            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            @elseif (Auth::user()->idrol == 3)
            <template v-if="menu==0">
                <dashboard></dashboard>
            </template>
            <template v-if="menu==1">
                <categoria></categoria>
            </template>

            <template v-if="menu==2">
                <articulo></articulo>
            </template>

            <template v-if="menu==3">
                <ingreso></ingreso>
            </template>

            <template v-if="menu==4">
                <proveedor></proveedor>
            </template>
            <template v-if="menu==9">
            <consultaingreso></consultaingreso>
            </template>
            <template v-if="menu==5">
                <venta></venta>
                </template>
    
                <template v-if="menu==6">
                    <cliente></cliente>
                </template>
                <template v-if="menu==10">
                <consultaventa></consultaventa>
                </template>
            <template v-if="menu==20">
                <reportes></reportes>
            </template>
            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            <template v-if="menu==13">
                <sucursal></sucursal>
            </template>
            <template v-if="menu==14">
                <marca></marca>
            </template>
            <template v-if="menu==15">
                <transferencia></transferencia>
            </template>
            <template v-if="menu==24">
                <historial></historial>
            </template>
            <template v-if="menu==25">
                <devolucion></devolucion>
            </template>
            <template v-if="menu==23">
                <reported></reported>
            </template>
            @elseif (Auth::user()->idrol == 4)
            <template v-if="menu==30">
                
                   <h1>hola</h1>
                
                </template>
            <template v-if="menu==14">
                <marca></marca>
            </template>
            <template v-if="menu==2">
                <articulo></articulo>
            </template>
            <template v-if="menu==21">
                <telefono></telefono>
            </template>
            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>
            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            @else

            @endif

    @endif
       
        
    @endsection