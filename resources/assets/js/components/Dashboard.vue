<template>
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="car-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Compras</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="ingresos">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Compras de los últimos meses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Ventas</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="ventas">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Ventas de los últimos meses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Traspasos</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="traspasos">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Traspasos de los últimos meses.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Celulares vendidos por marca</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="marcas">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Marcas vendidas hasta ahora.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Celulares vendidos por todo el año</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="celulares">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Marcas vendidas hasta ahora.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</template>
<script>
    export default {
        data (){
            return {
                varIngreso:null,
                charIngreso:null,
                ingresos:[],
                varTotalIngreso:[],
                varMesIngreso:[], 
                
                varVenta:null,
                charVenta:null,
                ventas:[],
                varTotalVenta:[],
                varMesVenta:[],

                varTraspaso:null,
                charTraspaso:null,
                traspasos:[],
                varTotalTraspaso:[],
                varMesTraspaso:[],

                varMarca:null,
                charMarca:null,
                charMarca1:null,
                marcas:[],
                varTotalMarca:[],
                varMesMarca:[],

                mar:'',

                varCelular:null,
                charCelular:null,
                charCelular1:null,
                celulares:[],
                varTotalCelular:[],
                varMesCelular:[],
                varNombreMar:[],
            }
        },
        methods : {
            getIngresos(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.ingresos = respuesta.ingresos;
                    //cargamos los datos del chart
                    me.loadIngresos();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getVentas(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.ventas = respuesta.ventas;
                    //cargamos los datos del chart
                    me.loadVentas();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getTraspasos(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.traspasos = respuesta.traspasos;
                    //cargamos los datos del chart
                    me.loadTraspasos();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getMarcas(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.marcas = respuesta.marcas;
                    me.mar = respuesta.mar;
                    //cargamos los datos del chart
                    me.loadMarcas();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getCelulares(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.celulares = respuesta.celulares;
                    me.mar = respuesta.mar;
                    //cargamos los datos del chart
                    me.loadCelulares();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadIngresos(){
                let me=this;
                me.ingresos.map(function(x){
                    me.varMesIngreso.push(x.mes);
                    me.varTotalIngreso.push(x.total);
                });
                me.varIngreso=document.getElementById('ingresos').getContext('2d');

                me.charIngreso = new Chart(me.varIngreso, {
                    type: 'bar',
                    data: {
                        labels: me.varMesIngreso,
                        datasets: [{
                            label: 'Compras',
                            data: me.varTotalIngreso,
                            backgroundColor: '#ffc107',
                            borderColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            loadVentas(){
                let me=this;
                me.ventas.map(function(x){
                    me.varMesVenta.push(x.mes);
                    me.varTotalVenta.push(x.total);
                });
                me.varVenta=document.getElementById('ventas').getContext('2d');

                me.charVenta = new Chart(me.varVenta, {
                    type: 'bar',
                    data: {
                        labels: me.varMesVenta,
                        datasets: [{
                            label: 'Ventas',
                            data: me.varTotalVenta,
                            backgroundColor: '#007bff',
                            borderColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            loadTraspasos(){
                let me=this;
                me.traspasos.map(function(x){
                    me.varMesTraspaso.push(x.mes);
                    me.varTotalTraspaso.push(x.total);
                });
                me.varTraspaso=document.getElementById('traspasos').getContext('2d');

                me.charTraspaso = new Chart(me.varTraspaso, {
                    type: 'bar',
                    data: {
                        labels: me.varMesTraspaso,
                        datasets: [{
                            label: 'Traspasos',
                            data: me.varTotalTraspaso,
                            backgroundColor: '#10DE16',
                            borderColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            loadMarcas(){
                let me=this;
                me.marcas.map(function(x){
                    me.varMesMarca.push(x.mes);
                    me.varTotalMarca.push(x.total);
                });
                me.varMarca=document.getElementById('marcas').getContext('2d');

                me.charMarca = new Chart(me.varMarca, {
                    type: 'pie',
                    data: {
                        labels: [
                                "Huawei",
                                "Apple",
                                "Xiaomi",
                                "Samsung",
                                "Sony"
                            ],
                        datasets: [
                                    {
                                        data: [133, 86, 52, 51, 50],
                                        backgroundColor: [
                                            "#FF6384",
                                            "#22CDE1",
                                            "#84FF63",
                                            "#8463FF",
                                            "#6384FF"
                                        ]
                                    }]
                    },
                });
            },
            loadCelulares(){
                let me=this;
                me.celulares.map(function(x){
                    me.varMesCelular.push(x.mes);
                    me.varTotalCelular.push(x.total);
                    me.varNombreMar.push(x.nombre_marca);
                });
                me.varCelular=document.getElementById('celulares').getContext('2d');
               // for(var i=0; i<this.varNombreMar.length; i++){
                me.charCelular = new Chart(me.varCelular, {
                    type: 'line',
                    data: {
                        labels: me.varMesCelular,
                        datasets: [{
                            label: me.varNombreMar[1],
                            data: me.varTotalCelular,
                            backgroundColor: 'transparent',
                            borderColor: 'orange',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
                                                 //forend       
                                             //    };
            },
            nomMM(){
                for(var i=0; i<this.varNombreMar.length; i++){
                    return this.varNombreMar[i];
                };
            },
        },
        
        mounted() {
            this.getIngresos();
            this.getVentas();
            this.getTraspasos();
            this.getMarcas();
            this.getCelulares();
            this.nomMM();
        }
    }
</script>
