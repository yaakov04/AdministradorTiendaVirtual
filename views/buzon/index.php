<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Reclamos</h2>
        </header>
        <div class="card__content card__content-table">
            <table id="table_id" class="display lista_mensajes" style="width:100%">
                <thead>
                    <tr>
                        <th>Reclamo</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Asunto</th>
                        <th>Leido</th>
                        <th>Resuelto</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($this->reclamos as $reclamo) {?>
                    <tr>
                        <td><?php echo $reclamo['reclamo'] ?></td>
                        <td><?php echo $reclamo['nombre'] ?></td>
                        <td><?php echo $reclamo['correo'] ?></td>
                        <td>
                            <a data-link="true" data-leido="<?php echo $reclamo['leido'] ?>" data-mensaje-id="<?php echo $reclamo['id_mensaje'] ?>" href="<?php echo URL."buzon/mensaje/".$reclamo['reclamo']."#mensaje_".$reclamo['id_mensaje']?>"><?php echo $reclamo['asunto'] ?></a>
                        </td>
                        <td><?php echo $reclamo['leido']? 'Leido':'No Leido' ?></td>
                        <td><?php echo $reclamo['resuelto']? '<i style="color:var(--verdePrimario);" class="far fa-check-circle"></i> Resuelto':'<i style="color:#e83f3f;" class="far fa-times-circle"></i> No resuelto' ?></td>
                        <td><?php echo $reclamo['fecha'] ?></td>
                    </tr>
                    <?php }//foreach?>

                   

                </tbody>
                <tfoot>
                    <tr>
                    <th>Reclamo</th>
                    <th>Nombre</th>
                        <th>Correo</th>
                        <th>Asunto</th>
                        <th>Leido</th>
                        <th>Resuelto</th>
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