function peticionAjax(controller, metodo, datos) {
    //peticion ajax
    const xhr = new XMLHttpRequest();

    //abrir conexion
    xhr.open('POST', `http://localhost/admin-elPuestito/${controller}/${metodo}`, true);
    //cargar
    xhr.onload = function() {
            if (this.status === 200) {
                respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta);

                if (respuesta.respuesta == 'exito') {
                    switch (respuesta.tipo) {
                        case "registrarProducto":
                            exitoRegistrarProducto(respuesta.mensaje);
                            break;
                        case "registrarCategoria":
                            exitoRegistrarProducto(respuesta.mensaje);
                            break
                        default:
                            break;
                    }

                } else {
                    //Error
                    if (respuesta.respuesta == 'error') {

                    }

                }
            } //status 200
        } //onload

    //enviar
    xhr.send(datos);


}

function exitoRegistrarProducto(mensaje) {
    notificacionCorrecto(mensaje, 100, 800);
    let formulario = document.querySelector('.form');
    let inputs = Array.prototype.slice.call(formulario.querySelectorAll('input'));
    let selects = Array.prototype.slice.call(formulario.querySelectorAll('select'));
    let textAreas = Array.prototype.slice.call(formulario.querySelectorAll('textarea'));
    inputs = inputs.concat(selects);
    inputs = inputs.concat(textAreas);
    //console.log(inputs);
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
}