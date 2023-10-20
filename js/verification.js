    //Habilitacion de listas
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
                swal({
                    icon: "success",
                    text: (data),
                    })
                window.location = "lista_centro.php";
            },
            error: function (data) {
                swal({
                    icon: "error",
                    text: (data),
                    })
                window.location = "lista_centro.php";
            },
            });
        });
    });


 