(function() {
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('myChart')) {
            getNTotalVentas();
        }
        if (document.getElementById('myLineChart')) {
            getVentasCompletadas();
        }

        function getNTotalVentas() {
            const controller = 'servicioVentas';
            const metodo = 'getVentasTotales';
            const datos = null;
            let = resultado = null;
            //peticion ajax
            const xhr = new XMLHttpRequest();

            //abrir conexion
            xhr.open('POST', `http://localhost/admin-elPuestito/${controller}/${metodo}`, true);
            //cargar
            xhr.onload = function() {
                    if (this.status === 200) {
                        respuesta = JSON.parse(xhr.responseText);
                        //console.log(respuesta);

                        resultado = respuesta;
                        if (resultado) {

                            //pie
                            if (document.getElementById('myChart')) {
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: "pie",
                                    data: {
                                        labels: ['Total de ventas', 'Ventas Completadas', 'Ventas pendientes'],
                                        datasets: [{
                                            label: 'Num datos',
                                            data: resultado,
                                            backgroundColor: [
                                                '#17a2b8',
                                                '#28a745',
                                                '#ffc107'
                                            ]
                                        }]
                                    },
                                    options: {
                                        title: {
                                            display: true,
                                            text: 'Total de ventas del mes'
                                        }
                                    }
                                });

                            }


                        } //resultado


                    } //status 200
                } //onload

            //enviar
            xhr.send(datos);

        } //func

        function getVentasCompletadas() {
            const controller = 'servicioVentas';
            const metodo = 'getVentasCompletas';
            const datos = null;
            let = resultado = null;
            //peticion ajax
            const xhr = new XMLHttpRequest();

            //abrir conexion
            xhr.open('POST', `http://localhost/admin-elPuestito/${controller}/${metodo}`, true);
            //cargar
            xhr.onload = function() {
                    if (this.status === 200) {
                        respuesta = JSON.parse(xhr.responseText);
                        //console.log(respuesta);

                        resultado = respuesta;
                        if (resultado) {

                            ///Grafica
                            //line
                            if (document.getElementById('myLineChart')) {
                                var ctxLine = document.getElementById('myLineChart').getContext('2d');
                                var myLineChart = new Chart(ctxLine, {
                                    type: "line",
                                    data: {
                                        labels: resultado.dia,
                                        datasets: [{
                                            label: 'Total de ventas',
                                            data: resultado.numero_ventas_dias,
                                            backgroundColor: '#35d659',
                                            borderColor: '#28a745',
                                            fill: false,
                                            borderWidth: 2

                                        }]
                                    },
                                    options: {
                                        title: {
                                            display: true,
                                            text: 'Ventas completadas del mes'
                                        },
                                        tooltips: {
                                            mode: 'index',
                                            intersect: false,
                                        },
                                        hover: {
                                            mode: 'nearest',
                                            intersect: true
                                        },
                                        scales: {
                                            xAxes: [{
                                                display: true,
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Dias'
                                                }
                                            }],
                                            yAxes: [{
                                                ticks: {
                                                    stepSize: 1
                                                },
                                                display: true,
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Ventas'
                                                }
                                            }],

                                        }
                                    }
                                });
                            } //if


                        } //resultado


                    } //status 200
                } //onload

            //enviar
            xhr.send(datos);
        }




    }); //DOM CONTENT LOADED
})();