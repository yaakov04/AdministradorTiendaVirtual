<?php require 'views/header.php';?>
<?php require 'views/aside.php';
$datos_perfil=$this->datos_perfil;
?>
<main class="main_container__main">

<div class="card card--width--all">
    <header>
        <h2 class="card__header">Datos del usuario</h2>
    </header>
    <div class="card__content card__content-form">
            <form class="form" action="#" method="POST">
                <fieldset class="form__fieldset">
                    <legend>
                        <h3 class="form__legend">Datos del administrador</h3>
                    </legend>
                    <div class="form__row">
                        <div>
                            <label for="nombre" class="form__label">Nombre:</label>
                            <input name="nombre" type="text" class="form__input form__input-width-all" placeholder="Nombre" value="<?php echo $datos_perfil['nombre'] ?>">
                        </div>
                    </div>
                    <div class="form__row">
                        <div>
                            <label for="username" class="form__label">Nombre de usuario:</label>
                            <input name="username" type="text" class="form__input form__input-width-all" placeholder="Nombre de usuario" value="<?php echo $datos_perfil['usuario'] ?>">
                        </div>
                    </div>
                    <div class="form__row">
                        <div>
                            <label for="email" class="form__label">Correo electronico:</label>
                            <input name="email" type="text" class="form__input form__input-width-all" placeholder="Correo electronico" value="<?php echo $datos_perfil['correo'] ?>">
                        </div>
                    </div>
                    <div class="form__row">
                        <div>
                            <label for="password" class="form__label">Contraseña:</label>
                            <input data-ignorar="true" name="password" type="password" class="form__input form__input-width-all" placeholder="Contraseña">
                        </div>
                    </div>
                   
                </fieldset>
                <button id="actualizar-datosPerfil" type="submit" class="form__submit ">Actualizar</button>
            </form>
        </div>
    <footer>
        <p class="card__footer ">Agregar categoria</p>
    </footer>
</div>
<!--.card-->

</main>
<?php require 'views/footer.php';?>