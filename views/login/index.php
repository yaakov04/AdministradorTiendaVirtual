<?php require 'views/header2.php';?>

<div >
    <form class="login" action="#" method="POST">
        <fieldset class="login__fieldset">
            <legend><h2>Inicia sesión</h2></legend>
            <label class="login__label" for="usuario">Nombre de usuario:</label>
            <input class="login__input" type="text" name="usuario" id="usuario">
            <label class="login__label" for="password">Contraseña:</label>
            <input class="login__input" type="password" name="password" id="password">
            <button class="login__btn">Iniciar sesión</button>
        </fieldset>
        
    </form>
</div>

<?php require 'views/footer.php';?>