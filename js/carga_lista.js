$(document).ready(function(){
    $("#enviarFormulario").click(function() {
        // Obtener los datos del formulario
        var formData = $("#formularioElecciones").serialize();
        
        $.ajax({
            method: "POST",
            url: "action_carga_lista.php", // Cambia "procesar_formulario.php" al nombre de tu archivo PHP
            data: formData,
            success: function(data) {
                console.log(data);
                // Realizar acciones según la respuesta del servidor
                if (data == "Exito") {
                    swal({
                        icon: "success",
                        title: "Formulario enviado correctamente",
                        timer: 1100,
                        button: false,}).then(function(){window.location = "lista_centro.php";});
                } else if (data == "Rellene todos los campos.") {
                    swal({
                        icon: "error",
                        text: "Rellene todos los campos.",
                        timer: 1500,
                        button: false
                    });
                }else{
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