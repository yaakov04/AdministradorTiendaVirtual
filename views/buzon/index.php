<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Mensajes</h2>
        </header>
        <div class="card__content card__content-table">
            <table id="table_id" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Asunto</th>
                        <th>Leido</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Juan Toledano</td>
                        <td>tole.j@fakemail.com</td>
                        <td>
                            <a href="<?php echo URL ?>buzon/mensaje/1">Problema con mi producto</a>
                        </td>
                        <td>No Leido</td>
                        <td>11/10/2020</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Asunto</th>
                        <th>Leido</th>
                        <th>fecha</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <footer>
            <p class="card__footer">Mensajes</p>
        </footer>
    </div>


</main>
<?php require 'views/footer.php';?>