$(document).ready(function () {
    $(".habilitar").on("click", function () {
        let id = $(this).val();

        $.ajax({
            method: 'POST',
            url: 'verification_cde.php',
            data: {
                id: id,
            },
            success: function (data) {
                if (data.startsWith('Error: ')) {
                    // Extracting the error message and displaying it in SweetAlert
                    const errorMessage = data.substring(7); // Removing 'Error: ' prefix
                    swal({
                        icon: "error",
                        title: "Error",
                        text: errorMessage,
                    });
                } else {
                    swal({
                        icon: "success",
                        text: data,
                    }).then(function() {
                        window.location = "lista_centro.php";
                    });
                }
            }
        });
    });
});
