<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Categorías</h2>
        </header>
        <div class="card__content card__content-table">
            <table id="table_id" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Electrónicos</td>
                        <td>electronicos</td>
                        <td><a href="#"><i class="fas fa-edit"></i></a><button><i class="fas fa-trash-alt"></i></button></td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
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