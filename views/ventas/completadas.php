<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card">
        <header>
            <h2 class="card__header">Gráfico de ventas</h2>
        </header>
        <canvas class="card__content card__content-canvas" id="myLineChart" width="900" height="450"></canvas>
        <footer>
            <p class="card__footer">Gráfico de ventas</p>
        </footer>
    </div>
    <!--.card-->

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Ventas completadas</h2>
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
                <?php foreach ($this->ventas as $venta) {?>
                    <tr>
                        <td><a href="detalles-venta.html"><?php echo $venta['id_venta'] ?></a></td>
                        <td><?php echo $venta['estatus'] ?></td>
                        <td><?php echo $venta['comprador'] ?></td>
                        <td><?php echo $venta['fecha_venta'] ?></td>
                        <td style="max-width: 3rem;overflow: hidden;text-overflow: ellipsis;">
                        <?php
                        foreach ($venta['detalles_pedido']as $detalles_pedido) {
                            echo '<i class="fas fa-shopping-bag"></i> '.$detalles_pedido['nombre_producto'].' X'.$detalles_pedido['cantidad_producto'].' '.$detalles_pedido['precio_producto'].'<br>';
                        }
                        ?>
                        </td>
                        <td style="max-width: 3rem;text-overflow: ellipsis;"><?php echo $venta['datos_envio'] ?></td>
                        <td><?php echo $venta['total'] ?></td>
                    </tr>
                <?php  } ?>



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
            <p class="card__footer">Ventas completadas</p>
        </footer>
    </div>


</main>
<?php require 'views/footer.php';?>