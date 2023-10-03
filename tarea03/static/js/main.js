let results = {};

window.onload = function() {
    // agregar los eventos a cada boton

    const selector = $(".btn-load");

    // el mouse está sobre el boton
    selector.mouseover(function() {
        obtenerValor($(this).text());
        $(this).css("background-color", "#3caed8"); // cambiar el color
    });
    
    // el mouse sale del boton
    selector.mouseout(function() {
        $("#resultado").html("");
        $(this).removeAttr("style");
    });
}

// Mandar a llamar con ajax al archivo instrumentos.php y mostrar el resultado en el div con id resultado
function obtenerValor(instrumentoNombre) {
    // Guardar en cache
    if (results[instrumentoNombre]) {
        $("#resultado").html(results[instrumentoNombre]);
        return;
    }

    // Consultar la información al archivo instrumentos.php
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
