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
                        <th>Vendidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>URL</td>
                        <td>5</td>
                        <td>Joystick</td>
                        <td>Electronicos</td>
                        <td>Joystick inalambrico</td>
                        <td>25</td>
                        <td>$0.00</td>
                        <td>$150.00</td>

                        <td>3</td>
                        <td><a href="#"><i class="fas fa-edit"></i></a><button><i class="fas fa-trash-alt"></i></button></td>
                    </tr>

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
                        <th>Vendidos</th>
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