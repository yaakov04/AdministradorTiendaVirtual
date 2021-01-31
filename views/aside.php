<aside class="main_container__element main_container__aside">
    <div class="admin_profile">
        <img class="admin_profile__img" src="img/user.png" alt="imagen de perfil">
        <p class="admin_profile__nombre">Juanito Banobacoa</p>
        <div>
            <a href="perfil.html" class="admin_profile__accion"><i class="fas fa-user"></i></a>
            <a href="buzon.html" class="admin_profile__accion"><i class="fas fa-envelope"></i></a>
            <a href="#" class="admin_profile__accion"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
    <nav class="navegacion">
        <ul>
            <li>
                <a class="navegacion__enlace" data-link="true" href="<?php echo URL ?>dashboard">Resumen<i class="fas fa-angle-left"></i></a>

            </li>
            <li><a href="#" class="navegacion__enlace" data-menu="true">Ventas<i class="fas fa-angle-left navegacion__enlace-icon"></i></a>

                <ul class="transicion">
                    <li><a href="ventas-totales.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ventas totales<i class="fas fa-cash-register"></i></a> </li>
                    <li><a href="ventas-completadas.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ventas completadas<i class="far fa-check-circle"></i></a></li>
                    <li><a href="ventas-pendientes.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ventas pendientes<i class="fas fa-business-time"></i></a> </li>
                </ul>

            </li>
            <li><a href="#" class="navegacion__enlace" data-menu="true">Productos<i class="fas fa-angle-left navegacion__enlace-icon"></i></a>
                <ul class="transicion">
                    <li><a href="lista-productos.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ver todos los productos <i class="fas fa-list"></i> </a> </li>
                    <li><a href="agregar-producto.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Agregar producto <i class="fas fa-plus-circle"></i> </a> </li>
                </ul>
            </li>
            <li><a href="#" class="navegacion__enlace" data-menu="true">Categorias<i class="fas fa-angle-left navegacion__enlace-icon"></i></a>
                <ul class="transicion">
                    <li><a href="lista-categorias.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Ver todas las categorias<i class="fas fa-list"></i></a> </li>
                    <li><a href="agregar-categoria.html" data-link="true" class="navegacion__enlace navegacion__enlace-sub">Agregar categoria<i class="fas fa-plus-circle"></i></a> </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>