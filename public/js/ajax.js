(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const btnAgregarProducto = document.querySelector('#agregar-producto') || null;
        const btnAgregarCategoria = document.querySelector('#agregar-categoria') || null;
        const btnEditarCategoria = document.querySelector('#editar-producto') || null;
        const listaMensajes = document.querySelector('.lista_mensajes');
        const btnResponderMensaje = document.querySelector('#btn-responder');
        const btnActualizarPerfil = document.querySelector('#actualizar-datosPerfil') || null;


        if (btnAgregarProducto) {
            btnAgregarProducto.addEventListener('click', agregarProducto);
        }
        if (btnAgregarCategoria) {
            btnAgregarCategoria.addEventListener('click', agregarCategoria);
        }
        if (btnEditarCategoria) {
            btnEditarCategoria.addEventListener('click', editarProducto);
        }
        if (listaMensajes) {
            listaMensajes.addEventListener('click', cambiarLeido)
        }
        if (btnResponderMensaje) {
            btnResponderMensaje.addEventListener('click', responderMensaje)
        }
        if (btnActualizarPerfil) {
            btnActualizarPerfil.addEventListener('click', actualizarPerfil);
        }


        function agregarProducto(e) {
            e.preventDefault();
            if (camposVaciosForm(btnAgregarProducto)) {
                alert('campos vacios')
            } else {
                let valores = obtenerValoresForm(btnAgregarProducto);
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);
                detectandoFiles(datos);
                //console.log(...datos);
                let controller = 'productos';
                let metodo = 'insertar';
                peticionAjax(controller, metodo, datos);
            }

        } //
        function editarProducto(e) {
            e.preventDefault();
            if (camposVaciosForm2(btnEditarCategoria)) {
                alert('campos vacios')
            } else {
                let valores = obtenerValoresForm(btnEditarCategoria);
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);
                detectandoFiles(datos);
                datos.append('id_producto', btnEditarCategoria.getAttribute('data-id-producto'));
                //console.log(...datos);
                let controller = 'productos';
                let metodo = 'editar';
                peticionAjax(controller, metodo, datos);
            }

        } //
        function agregarCategoria(e) {
            e.preventDefault();
            if (camposVaciosForm(btnAgregarCategoria)) {
                alert('campos vacios')
            } else {
                let valores = obtenerValoresForm(btnAgregarCategoria);
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);
                detectandoFiles(datos);
                //console.log(...datos);
                let controller = 'categorias';
                let metodo = 'insertar';
                peticionAjax(controller, metodo, datos);
            }
        }

        function cambiarLeido(e) {
            e.preventDefault();

            if (e.target.getAttribute('data-link') == 'true') {
                const enlace = e.target.href;
                if (e.target.getAttribute('data-leido') == '0') {
                    const id_mensaje = e.target.getAttribute('data-mensaje-id');
                    let controller = 'buzon';
                    let metodo = 'cambiarLeido';
                    let datos = new FormData();
                    datos.append('id_mensaje', id_mensaje);
                    datos.append('enlace', enlace)
                    peticionAjax(controller, metodo, datos);
                } else {
                    window.location.href = enlace;
                }

            }
        } //
        function responderMensaje(e) {
            e.preventDefault();
            if (camposVaciosForm(btnResponderMensaje)) {
                alert('campos vacios')
            } else {
                let valores = obtenerValoresForm(btnResponderMensaje);
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);

                //console.log(...datos);
                let controller = 'buzon';
                let metodo = 'responderMensaje';
                peticionAjax(controller, metodo, datos);
            }
        }

        function actualizarPerfil(e) {
            e.preventDefault();
            if (camposVaciosForm2(btnActualizarPerfil)) {
                alert('campos vacios')
            } else {
                let valores = obtenerValoresForm(btnActualizarPerfil);
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);

                //console.log(...datos);
                let controller = 'perfil';
                let metodo = 'actualizar';
                peticionAjax(controller, metodo, datos);
            }
        }

        //crea el formdata de los valores obtenidos de un formulario para el ajax
        function insertandoDatosFormData(valores) {
            let datos = new FormData();
            for (i = 0; i < valores['llave'].length; i++) {
                datos.append(valores['llave'][i], valores['valor'][i]);
            }
            return datos;
        }
        //obtiene los valores de un formulario
        function obtenerValoresForm(btn) {
            let formulario = btn.parentElement.parentElement;
            let inputs = formulario.querySelectorAll('input');
            let selects = formulario.querySelectorAll('select');
            let arreglo = new Array();
            let valores = new Array();
            valores['llave'] = new Array();
            valores['valor'] = new Array();
            for (i = 0; i < inputs.length; i++) {
                if (inputs[i].type == 'file') {
                    continue;
                } else {
                    arreglo.push(inputs[i]);
                }
            }
            for (e = 0; e < selects.length; e++) {
                arreglo.push(selects[e]);
            }
            for (a = 0; a < arreglo.length; a++) {
                if (arreglo[a].name === '') {} else {
                    if (arreglo[a].type == 'checkbox') {
                        valores['llave'].push(arreglo[a].name);
                        valores['valor'].push(arreglo[a].checked);
                    } else {
                        valores['llave'].push(arreglo[a].name);
                        valores['valor'].push(arreglo[a].value);
                    }

                }
            }
            return valores;
        } //

        //Obteniendo los valores del input.file y los inserta en el formdata
        function detectandoFiles(formdata) {
            if (document.querySelectorAll('input[type=file]').length > 0) {
                let inpuFiles = document.querySelectorAll('input[type=file]');
                formdata.append('archivo', inpuFiles[0].files[0]); //como solo se sube un archivo no hace falta ciclo
            }
        } //function
        //Obteniendo los valores del textarea y los inserta en el formdata
        function obteniendoDatosTextarea(formdata) {
            if (document.querySelectorAll('textarea').length > 0) {
                let textArea = document.querySelectorAll('textarea')[0];
                formdata.append(textArea.name, textArea.value);
            }
        } //function

        //comprueba si hay campos vacios en un formulario
        function camposVaciosForm(btn) {
            let formulario = btn.parentElement.parentElement;
            let inputs = Array.prototype.slice.call(formulario.querySelectorAll('input'));
            let selects = Array.prototype.slice.call(formulario.querySelectorAll('select'));
            let textAreas = Array.prototype.slice.call(formulario.querySelectorAll('textarea'));
            let valor = false;
            inputs = inputs.concat(selects);
            inputs = inputs.concat(textAreas);
            //console.log(inputs);
            for (i = 0; i < inputs.length; i++) {
                if (inputs[i].id == 'btn-registrarse') {

                } else {
                    if (inputs[i].value == '') {
                        //console.log('campo vacio');
                        valor = true;
                        i = inputs.length + 1;
                    }
                }
            }

            return valor
        } //
        //comprueba si hay campos vacios en un formulario
        function camposVaciosForm2(btn) {
            let formulario = btn.parentElement.parentElement;
            let inputs = Array.prototype.slice.call(formulario.querySelectorAll('input'));
            let selects = Array.prototype.slice.call(formulario.querySelectorAll('select'));
            let textAreas = Array.prototype.slice.call(formulario.querySelectorAll('textarea'));
            let valor = false;
            inputs = inputs.concat(selects);
            inputs = inputs.concat(textAreas);
            //console.log(inputs);
            for (i = 0; i < inputs.length; i++) {
                if (inputs[i].id == 'btn-registrarse' || inputs[i].id == 'img' || inputs[i].id == 'enOferta' || inputs[i].getAttribute('data-ignorar') == 'true') {

                } else {
                    if (inputs[i].value == '') {
                        //console.log('campo vacio');
                        valor = true;
                        i = inputs.length + 1;
                    }
                }
            }

            return valor
        } //

    }); //DOM CONTENT LOADED
})();