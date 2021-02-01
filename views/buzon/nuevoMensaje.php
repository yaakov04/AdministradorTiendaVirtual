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
            <label for="mensaje-nuevo" class="mensajeNuevo__campo">Respuesta:</label>
            <div class="mensajeNuevo__row">
                <textarea name="mensaje-nuevo" id="mensaje-nuevo" class="mensajeNuevo__textArea"></textarea>
            </div>
            <button class="mensajeNuevo__btn">Enviar</button>
            <a href="<?php echo URL ?>buzon/mensaje/1">Cancelar</a>
        </div>
    </div>

    <footer>
        <p class="card__footer">Escribir nuevo mensaje</p>
    </footer>
</div>
<!--.card-->




</main>
<?php require 'views/footer.php';?>