<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

<div class="card card--width--all">
    <header>
        <h2 class="card__header">Escribir nuevo mensaje</h2>
    </header>
    <div class="card__content">
        <div class="mensajeNuevo">
            <p class="mensajeNuevo__campo">Para: <span class="mensajeNuevo__inf">Juan Toledano</span></p>
            <p class="mensajeNuevo__campo">Fecha: <span class="mensajeNuevo__inf">30/01/2021</span></p>
            <form class="form" action="">
            <fieldset class="form__fieldset">
                <div>
                    <label for="mensaje-nuevo" class="mensajeNuevo__campo">Respuesta:</label>
                    <div class="mensajeNuevo__row">
                        <textarea name="mensaje-nuevo" id="mensaje-nuevo" class="mensajeNuevo__textArea"></textarea>
                    </div>
                </div>
                <input type="hidden" name="reclamos_id" value="<?php echo $this->datos['reclamos_id'] ?>">
                <input type="hidden" name="venta_id" value="<?php echo $this->datos['venta_id'] ?>">
                <input type="hidden" name="pedido_id" value="<?php echo $this->datos['pedido_id'] ?>">
                <input type="hidden" name="respuesta_mensaje" value="<?php echo $this->datos['respuesta_mensaje'] ?>">
                <input type="hidden" name="asunto" value="<?php echo $this->datos['asunto'] ?>">
            </fieldset>
                
                <button id="btn-responder" class="mensajeNuevo__btn">Enviar</button>
                <a href="<?php echo URL.'buzon/mensaje/'. $this->datos['reclamos_id'] ?>">Cancelar</a>
            </form>
        </div>
    </div>

    <footer>
        <p class="card__footer">Escribir nuevo mensaje</p>
    </footer>
</div>
<!--.card-->




</main>
<?php require 'views/footer.php';?>