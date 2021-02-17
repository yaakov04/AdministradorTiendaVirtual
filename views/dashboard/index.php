<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Tareas pendientes</h2>
        </header>
        <div class="card__content card__content-grid">
            <div class="boxInfo boxInfo--color-yellow">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Envíos pendientes:</p>
                        <p class="boxInfo__txt boxInfo__txt-number"><?php echo $this->envios_pendientes;?></p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-shipping-fast"></i></i>
                        </i>
                    </div>
                </div>
                <footer><a href="<?php echo URL .'dashboard/enviosPendientes' ?>" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->

            <div class="boxInfo boxInfo--color-blue">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Mensajes sin leer:</p>
                        <p class="boxInfo__txt boxInfo__txt-number">0</p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-envelope"></i></i>
                        </i>
                    </div>
                </div>
                <footer><a href="#" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->

            <div class="boxInfo boxInfo--color-yellow">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Devoluciones:</p>
                        <p class="boxInfo__txt boxInfo__txt-number">0</p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-undo"></i></div>
                </div>
                <footer><a href="#" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->



        </div>
        <!--.card__content-grid-->

        <footer>
            <p class="card__footer">Tareas pendientes</p>
        </footer>
    </div>
    <!--.card-->

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Ventas</h2>
        </header>
        <div class="card__content card__content-grid">
            <div class="boxInfo boxInfo--color-blue">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Numero total de ventas:</p>
                        <p class="boxInfo__txt boxInfo__txt-number"><?php echo $this->nTotalVentas; ?></p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-shopping-bag"></i></div>
                </div>
                <footer><a href="#" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->

            <div class="boxInfo boxInfo--color-green">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Ventas completadas:</p>
                        <p class="boxInfo__txt boxInfo__txt-number"><?php echo $this->nVentasCompletadas; ?></p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-check-square"></i></i>
                    </div>
                </div>
                <footer><a href="#" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->

            <div class="boxInfo boxInfo--color-yellow">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Ventas pendientes:</p>
                        <p class="boxInfo__txt boxInfo__txt-number"><?php echo $this->nVentasPendientes; ?></p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-clock"></i></div>
                </div>
                <footer><a href="#" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->

            <div class="boxInfo boxInfo--color-green">
                <div class="boxInfo__content">
                    <div>
                        <p class="boxInfo__txt">Ganacias totales:</p>
                        <p class="boxInfo__txt boxInfo__txt-number"><?php echo $this->gananciasTotales ?></p>
                    </div>
                    <div class="boxInfo__icon"><i class="fas fa-dollar-sign"></i></i>
                    </div>
                </div>
                <footer><a href="#" class="boxInfo__footer">Más información</a></footer>
            </div>
            <!--.boxInfo-->

        </div>
        <!--.card__content-grid-->

        <footer>
            <p class="card__footer">Ventas</p>
        </footer>
    </div>
    <!--.card-->

    <div class="card">
        <header>
            <h2 class="card__header">Gráfico de ventas</h2>
        </header>
        <canvas class="card__content card__content-canvas" id="myChart" width="900" height="450"></canvas>
        <footer>
            <p class="card__footer">Gráfico de ventas</p>
        </footer>
    </div>
    <!--.card-->


</main><!--main_container__main-->
<?php require 'views/footer.php';?>