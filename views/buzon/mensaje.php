<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

<?php foreach ($this->mensajes as $mensaje) {?>

    <div id="<?php echo 'mensaje_'.$mensaje['id_mensaje'] ?>" class="card card--width--all">
        <header>
            <h2 class="card__header">Mensaje #<?php echo $mensaje['id_mensaje'] ?></h2>
        </header>
        <div class="card__content">
            <div class="mensaje">
                <p>Id reclamo: <?php echo $mensaje['reclamo'] ?></p>
                <p>Id venta: <?php echo $mensaje['venta'] ?></p>
                <p>Id pedido: <?php echo $mensaje['pedido'] ?></p>
                <p><?php echo $mensaje['nombre'] ?></p>
                <p><?php echo $mensaje['correo'] ?></p>
                <p><?php echo $mensaje['fecha'] ?></p>
                <div class="mensaje__acciones">
                    <a class="mensaje__enlace" href="<?php echo URL.'buzon/nuevoMensaje?respuesta_mensaje='.$mensaje['id_mensaje'].
                    '&reclamo_id='.$mensaje['reclamo'].'&venta_id='.$mensaje['venta'].'&pedido_id='.$mensaje['pedido'].'&asunto=Re:'.
                     $mensaje['asunto'] ?>">Responder</a>
                    <a class="mensaje__enlace" href="<?php echo URL ?>buzon">Regresar</a>
                </div>

                <p class="mensaje__asunto"><?php echo $mensaje['asunto'] ?></p>
                <p><?php echo $mensaje['mensaje'] ?></p>
            </div>
        </div>

        <footer>
            <p class="card__footer">Mensaje</p>
        </footer>
    </div>
    <!--.card-->
<?php }//foreach ?>



</main>
<?php require 'views/footer.php';?>