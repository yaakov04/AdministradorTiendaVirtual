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