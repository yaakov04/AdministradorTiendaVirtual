<?php require 'views/header.php';?>
<?php require 'views/aside.php';?>
<main class="main_container__main">

    <div class="card card--width--all">
        <header>
            <h2 class="card__header">Agregar producto</h2>
        </header>
        <div class="card__content card__content-form">
            <form class="form" action="#" method="POST">
                <fieldset class="form__fieldset">
                    <legend>
                        <h3 class="form__legend">Agrega nuevo producto</h3>
                    </legend>
                    <div class="form__row">
                        <div>
                            <label for="nombre" class="form__label">Nombre:</label>
                            <input name="nombre" type="text" class="form__input form__input-width-all" placeholder="Nombre del producto">
                        </div>
                        <div>
                            <label for="precio" class="form__label">Precio:</label>
                            <input id="precio" name="precio" type="tel" class="form__input form__input-width-30">
                        </div>
                    </div>
                    <div class="form__row">
                        <div>
                            <label for="categoria" class="form__label">Seleccione la categoría:</label>
                            <select name="categoria" id="categoria" class="form__input form__input-width-all">
                                <option  value="" selected disabled>Seleccione una opcion</option>
                                <?php foreach ($this->categorias as $categoria) {?>
                                    <option  value="<?php echo $categoria['id'] ?>"><?php echo $categoria['categoria'] ?></option>
                                <?php }//foreach ?>
                            </select>
                        </div>
                        <div>
                            <label for="costo_envio" class="form__label">Costo de envio:</label>
                            <input id="costo_envio" name="costo_envio" type="tel" class="form__input form__input-width-30">
                        </div>

                    </div>
                    <div class="form__row">
                        <div>
                            <label for="stock" class="form__label">Stock:</label>
                            <input type="number" name="stock" id="stock" class="form__input form__input-width-30">
                        </div>
                        <div>
                            <label for="img" class="form__label">Imagen del producto:</label>
                            <input id="img" name="img" type="file" class="form__input form__input-file">
                        </div>

                    </div>
                    <div class="form__row ">

                        <label class="form__label" for="descripcion">Descripcion del producto:</label>
                        <textarea class="form__input form__input-textArea" name="descripcion" id="descripcion "></textarea>

                    </div>
                </fieldset>
                <button id="agregar-producto" type="submit" class="form__submit ">Agregar Producto</button>
            </form>
        </div>
        <footer>
            <p class="card__footer ">Agregar producto</p>
        </footer>
    </div>
    <!--.card-->

</main>
<?php require 'views/footer.php';?>