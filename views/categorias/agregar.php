<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Agregar categoria</h2>
        </header>
        <div class="card__content card__content-form">
            <form class="form" action="#" method="POST">
                <fieldset class="form__fieldset">
                    <legend>
                        <h3 class="form__legend">Agrega nueva categoria</h3>
                    </legend>
                    <div class="form__row">
                        <div>
                            <label for="nombre" class="form__label">Nombre:</label>
                            <input name="nombre" type="text" class="form__input form__input-width-all" placeholder="Nombre del producto">
                        </div>

                    </div>
                    <div class="form__row">
                        <div>
                            <label for="codigo" class="form__label">Codigo:</label>
                            <input name="codigo" type="tel" class="form__input form__input-width-all" placeholder="Codigo del producto">
                        </div>
                    </div>

                </fieldset>
                <button id="agregar-categoria" type="submit" class="form__submit ">Agregar categoria</button>
            </form>
        </div>
        <footer>
            <p class="card__footer ">Agregar categoria</p>
        </footer>
    </div>
    <!--.card-->

</main>
<?php require 'views/footer.php';?>