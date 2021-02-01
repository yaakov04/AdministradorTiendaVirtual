<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Mensaje</h2>
        </header>
        <div class="card__content">
            <div class="mensaje">
                <p>Juan Toledano</p>
                <p>tole.j@fakemail.com</p>
                <p>11/10/2020</p>
                <div class="mensaje__acciones">
                    <a class="mensaje__enlace" href="<?php echo URL ?>buzon/nuevoMensaje">Responder</a>
                    <a class="mensaje__enlace" href="<?php echo URL ?>buzon">Regresar</a>
                </div>

                <p class="mensaje__asunto">Problema con mi producto</p>
                <p>Traxit passim speciem deerat arce motura fluminaque sponte modo aberant retinebat usu deus os mollia vis terris animalia divino quarum ille melior iunctarum nondum iudicis phoebe caeca vix fulgura praecipites orbem rectumque cuncta
                    obstabatque lapidosos utque peragebant proximus umentia pressa faecis persidaque inmensa caeli tuba quarum carmen inminet cognati alto dei valles haec cognati liberioris triones possedit tellure deorum flexi auroram natura
                    his haec sunt.</p>
            </div>
        </div>

        <footer>
            <p class="card__footer">Mensaje</p>
        </footer>
    </div>
    <!--.card-->




</main>
<?php require 'views/footer.php';?>