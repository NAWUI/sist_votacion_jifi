$(document).ready(function() {
    $("#enviarFormulario").click(function() {
        // Obtener los datos del formulario
        var formData = $("#formularioElecciones").serializeArray();
        
        // Crear un conjunto para almacenar valores únicos
        var uniqueValues = new Set();
        var hasDuplicates = false;

        // Iterar sobre los datos del formulario
        formData.forEach(function(input) {
            if (uniqueValues.has(input.value)) {
                hasDuplicates = true;
                return false; // Detener la iteración si hay duplicados
            } else {
                uniqueValues.add(input.value);
            }
        });

        if (hasDuplicates) {
            swal({
                icon: "error",
                text: "Los valores en el formulario no deben repetirse.",
                timer: 1500,
                button: false
            });
            return; // No envía el formulario si hay duplicados
        }

        // Si no hay duplicados, procede a enviar el formulario
        $.ajax({
            method: "POST",
            url: "action_modif_lista.php",
            data: formData,
            success: function(data) {
                console.log(data);
                // Realizar acciones según la respuesta del servidor
                if (data == "Exito") {
                    swal({
                        icon: "success",
                        title: "Lista modificada exitosamente",
                        timer: 1100,
                        button: false
                    });
                    window.location = 'lista_centro.php';
                } else if (data == "Rellene todos los campos.") {
                    swal({
                        icon: "error",
                        text: "Rellene todos los campos.",
                        timer: 1500,
                        button: false
                    });
                } else if (data == "DNI o nombre de lista repetidos.") {
                    swal({
                        icon: "error",
                        text: "DNI o nombre de lista repetidos.",
                        timer: 1500,
                        button: false
                    });
                } else {
                    swal({
                        icon: "error",
                        text: "Error al enviar el formulario",
                        timer: 1500,
                        button: false
                    });
                }
            }
        });
    });
});
