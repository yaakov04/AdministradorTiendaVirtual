<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Productos</h2>
        </header>
        <div class="card__content card__content-table">
            <table id="table_id" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Img</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Envío</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($this->productos as $producto) {?>
                    <tr>
                        <td style="max-width:10rem;">
                        <img src="<?php echo '../elPuestito/public/img/img_productos/'. $producto['img_producto'] ?>" alt="">
                        </td>
                        <td><?php echo $producto['id'] ?></td>
                        <td><?php echo $producto['nombre_producto'] ?></td>
                        <td><?php echo $producto['categoria'] ?></td>
                        <td style="    max-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;"><?php echo $producto['descripcion_producto'] ?></td>
                        <td><?php echo $producto['stock'] ?></td>
                        <td>$<?php echo $producto['envio'] ?></td>
                        <td>$<?php echo $producto['precio'] ?></td>
                        <td><a href="<?php echo URL. 'productos/editarProducto/'.$producto['id'] ?>"><i class="fas fa-edit"></i></a></td>
                    </tr>
                   <?php }?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Img</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Envío</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <footer>
            <p class="card__footer">Productos</p>
        </footer>
    </div>


</main>
<?php require 'views/footer.php';?>