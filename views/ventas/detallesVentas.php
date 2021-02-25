<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Detalles de la venta</h2>
        </header>
        <div class="card__content">
            <?php foreach($this->ventas as $venta){?>
                <div class="detallesVenta">
                    <p><span class="detallesVenta__label">Id de venta:</span> <?php echo $venta['id_venta'] ?></p>
                    <p><span class="detallesVenta__label">Fecha de venta:</span> <?php echo $venta['fecha_venta'] ?></p>
                    <p><span class="detallesVenta__label">Comprador:</span> <?php echo $venta['comprador'] ?></p>
                    <p><span class="detallesVenta__label">Estatus actual:</span> <?php echo $venta['estatus'] ?></p>
                    <p><span class="detallesVenta__label">Datos de envío:</span> <?php echo $venta['datos_envio'] ?></p>
                    
                    <div class="pedidos">
                        <p class="pedidos__encabezado">Detalles de pedido:</p>
                        <table class="pedidos__tabla">
                            <tbody>
                            <?php foreach($venta['detalles_pedido']as $pedido){?>
                                <tr>
                                    <td class="pedidos__campo"><i class="fas fa-shopping-bag"></i></td>
                                    <td class="pedidos__campo"><?php echo $pedido['nombre_producto'] ?></td>
                                    <td class="pedidos__campo"><?php echo 'X '. $pedido['cantidad_producto'] ?></td>
                                    <td class="pedidos__campo pedidos__campo--precio"><?php echo $pedido['precio_producto'] ?></td>
                                </tr>
                            <?php }//foreach?>
                            </tbody>
                        </table>
                    
                    </div>
                    <p><span class="detallesVenta__label">Total:</span> <?php echo $venta['total'] ?></p>
                </div>
            <?php }//foreach ?>
            <form class="form" action="<?php echo URL . 'ventas/actualizarEstadoVenta' ?>" method="post">
                <fieldset class="form__fieldset">
                    <label class="form__label form__label--fontW-bold" for="actualizar_estatus">Actualizar Estatus</label>
                    <div class="form__row">
                        <select name="actualizar_estatus" id="actualizar_estatus" class="form__input">
                            <option value="0" selected disabled>Seleccione una opción</option>
                            <?php foreach($this->estatus as $estatus){ ?>
                                <option value="<?php echo $estatus['id'] ?>"><?php echo $estatus['estado'] ;?></option>
                            <?php }//foreach?>
                        </select>
                    </div>
                    <input type="hidden" name="id_venta" value="<?php echo $venta['id_venta'] ?>">
                </fieldset>
                <button id="btn-acutalizar-estado" type="submit" class="form__submit ">Actualizar</button>
            </form>
        </div>

        <footer>
            <p class="card__footer">Detalles de la venta</p>
        </footer>
    </div>
    <!--.card-->




</main>
<?php require 'views/footer.php';?>