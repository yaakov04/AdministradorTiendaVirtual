<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar administrador</title>
</head>
<style>
fieldset{
    display:flex;
    flex-direction:column;
}
input{
    width:50%;
}
</style>
<body>
    <form action="<?php echo URL.'registrarse/registrar' ?>" method="POST">
    <fieldset>
    <legend>Registrar administrador</legend>
    <label for="usuario">Nombre de usuario:</label>
    <input type="text" name="usuario" id="usuario" required>
    <label for="email">Correo electronico:</label>
    <input type="email" name="email" id="email" required>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    </fieldset>
<button>Registrar</button>
    </form>
</body>
</html>