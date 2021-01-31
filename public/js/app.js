(function() {
    document.addEventListener('DOMContentLoaded', function() {

        if (document.querySelector('.navegacion')) {
            let nav = document.querySelector('.navegacion');
            nav.addEventListener('click', menuDesplegable);
        }
        if (document.querySelector('#submit')) {
            let btnSubmit = document.querySelector('#submit');
            btnSubmit.addEventListener('click', submitForm)
        }

        function menuDesplegable(e) {
            e.preventDefault();
            let menu = e.target;
            if (menu.getAttribute('data-menu') == 'true') {
                if (menu.className == 'navegacion__enlace seleccionada') {
                    menu.classList.remove('seleccionada');
                    ocultarMenu(menu);
                } else {
                    menu.classList.add('seleccionada');
                    mostrarMenu(menu);
                }
            } else {
                if (menu.getAttribute('data-link') == 'true') {
                    window.location.href = menu.href;
                }
            }

        } //
        function mostrarMenu(menu) {
            let altura = 40 * menu.parentElement.children[1].querySelectorAll('a').length
            menu.parentElement.children[1].style.height = altura.toString() + 'px';
        }

        function ocultarMenu(menu) {
            menu.parentElement.children[1].style.height = '0px';
        }

        function submitForm(e) {
            e.preventDefault();
        }



        ///Grafica
        //line
        if (document.getElementById('myLineChart')) {
            var ctxLine = document.getElementById('myLineChart').getContext('2d');
            var myLineChart = new Chart(ctxLine, {
                type: "line",
                data: {
                    labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
                    datasets: [{
                        label: 'Total de ventas',
                        data: [2, 3, 3, 4],
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

        //pie
        if (document.getElementById('myChart')) {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ['Total de ventas', 'Ventas Completadas', 'Ventas pendientes'],
                    datasets: [{
                        label: 'Num datos',
                        data: [18, 13, 5],
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





    }); //DOM CONTENT LOADED
})();
if (document.querySelector('#table_id')) {
    $(function() {

        $(document).ready(function() {
            $('#table_id').DataTable();
        });

    });
}