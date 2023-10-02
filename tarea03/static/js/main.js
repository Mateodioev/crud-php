let results = {};

window.onload = function() {
    // agregar los eventos a cada boton
    document.querySelectorAll('.btn-load').forEach(button => {

        // Cambiar el color del boton al pasar el mouse sobre el y mostrar el resultado
        button.addEventListener('mouseover', () => {
            obtenerValor(button.innerHTML);
            button.style.backgroundColor = 'green';
        });
        // Regresar el color original del boton al quitar el mouse y borrar el resultado
        button.addEventListener('mouseout', () => {
            button.removeAttribute('style');
            document.getElementById('resultado').innerHTML = '';
        });
    });
}

// Mandar a llamar con ajax al archivo instrumentos.php y mostrar el resultado en el div con id resultado
function obtenerValor(instrumentoNombre) {
    // Guardar en cache
    if (results[instrumentoNombre]) {
        $("#resultado").html(results[instrumentoNombre]);
        return;
    }

    // Consultar la informacion al archivo instrumentos.php
    $.ajax({
        data: { 'instrumento': instrumentoNombre },
        url: 'instrumentos.php',
        type: 'get',
        beforeSend: function() {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function(response) {
            $("#resultado").html(response);
            results[instrumentoNombre] = response;
        }
    });
}
