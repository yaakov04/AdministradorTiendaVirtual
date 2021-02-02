(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const btnAgregarProducto = document.querySelector('#agregar-producto') || null;

        if (btnAgregarProducto) {
            btnAgregarProducto.addEventListener('click', agregarProducto);
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
                    valores['llave'].push(arreglo[a].name);
                    valores['valor'].push(arreglo[a].value);
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

    }); //DOM CONTENT LOADED
})();