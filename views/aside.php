<aside class="main_container__element main_container__aside">
    <div class="admin_profile">
        <img class="admin_profile__img" src="img/user.png" alt="imagen de perfil">
        <p class="admin_profile__nombre"><?php echo $_SESSION['nombre'] ?></p>
        <div>
            <a href="<?php echo URL ?>perfil" class="admin_profile__accion"><i class="fas fa-user"></i></a>
            <a href="<?php echo URL ?>buzon" class="admin_profile__accion"><i class="fas fa-envelope"></i></a>
            <a href="<?php echo URL ?>login?sesion=finalizada" class="admin_profile__accion"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
    <nav class="navegacion">
        <ul>
            <li>
                <a class="navegacion__enlace" data-link="true" href="<?php echo URL ?>dashboard">Resumen<i class="fas fa-angle-left"></i></a>

            </li>
            <li><a href="#" class="navegacion__enlace" data-menu="true">Ventas<i class="fas fa-angle-left navegacion__enlace-icon"></i></a>

                <ul class="transicion">
                    <li><a href="<?php echo URL ?>ventas" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ventas totales<i class="fas fa-cash-register"></i></a> </li>
                    <li><a href="<?php echo URL ?>ventas/completadas" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ventas completadas<i class="far fa-check-circle"></i></a></li>
                    <li><a href="<?php echo URL ?>ventas/pendientes" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ventas pendientes<i class="fas fa-business-time"></i></a> </li>
                </ul>

            </li>
            <li><a href="#" class="navegacion__enlace" data-menu="true">Productos<i class="fas fa-angle-left navegacion__enlace-icon"></i></a>
                <ul class="transicion">
                    <li><a href="<?php echo URL ?>productos" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ver todos los productos <i class="fas fa-list"></i> </a> </li>
                    <li><a href="<?php echo URL ?>productos/agregar" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Agregar producto <i class="fas fa-plus-circle"></i> </a> </li>
                </ul>
            </li>
            <li><a href="#" class="navegacion__enlace" data-menu="true">Categorias<i class="fas fa-angle-left navegacion__enlace-icon"></i></a>
                <ul class="transicion">
                    <li><a href="<?php echo URL ?>categorias" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ver todas las categorias<i class="fas fa-list"></i></a> </li>
                    <li><a href="<?php echo URL ?>categorias/agregar" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Agregar categoria<i class="fas fa-plus-circle"></i></a> </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>