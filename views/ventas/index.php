<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card">
        <header>
            <h2 class="card__header">Gráfico de ventas</h2>
        </header>
        <canvas class="card__content card__content-canvas" id="myChart" width="900" height="450"></canvas>
        <footer>
            <p class="card__footer">Gráfico de ventas</p>
        </footer>
    </div>
    <!--.card-->

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Total de ventas</h2>
        </header>
        <div class="card__content card__content-table">
            <table id="table_id" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID venta</th>
                        <th>Estatus</th>
                        <th>Comprador</th>
                        <th>Fecha venta</th>
                        <th>Detalle de pedido</th>
                        <th>Datos de envio</th>
                        <th>Total de pedido</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="detalles-venta.html">123456789</a></td>
                        <td>No pagado</td>
                        <td>Diego04</td>
                        <td>04/05/2020</td>
                        <td style="max-width: 3rem;
                        overflow: hidden;
                        text-overflow: ellipsis;">{"2":{"id":"2","nombre":"Mochila","precio":"200.00","img":"mochila.jpg","cantidad":2},"6":{"id":"6","nombre":"Soporte para pendientes","precio":"400.00","img":"soporte_pendientes.png","cantidad":1}}</td>
                        <td style="max-width: 3rem;text-overflow: ellipsis;">Baker Street 221-B, Londres, Inlgaterra, cp: 1200</td>
                        <td>$800.00</td>
                    </tr>



                </tbody>
                <tfoot>
                    <tr>
                        <th>ID venta</th>
                        <th>Estatus</th>
                        <th>Comprador</th>
                        <th>Fecha venta</th>
                        <th>Detalle de pedido</th>
                        <th>Datos de envio</th>
                        <th>Total de pedido</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <footer>
            <p class="card__footer">Total de ventas</p>
        </footer>
    </div>


</main>
<?php require 'views/footer.php';?>