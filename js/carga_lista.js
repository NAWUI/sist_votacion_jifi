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
            url: "action_carga_lista.php",
            data: formData,
            success: function(data) {
                
                console.log (typeof data);
                console.log (data);
                // Realizar acciones según la respuesta del servidor
                if (data == 1) {
                    swal({
                        icon: "success",
                        title: "Lista modificada exitosamente",
                        timer: 1100,
                        button: false
                    }).then(function(){
                        window.location = "lista_centro.php";
                    });
                } else if (data == 2) {
                    swal({
                        icon: "error",
                        text: "Rellene todos los campos.",
                        timer: 1500,
                        button: false
                    });
                } else if (data == 4) {
                    swal({
                        icon: "error",
                        text: 'DNI o nombre de lista repetidos.',
                        timer: 1500,
                        button: false
                    });
                } else if (data == 3) {
                    swal({
                        icon: "error",
                        text: 'Nombre de lista repetido.',
                        timer: 1500,
                        button: false
                    });
                    } else if (data.indexOf("El DNI") === 0) {

                    swal({
                        icon: "error",
                        text: data,
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
