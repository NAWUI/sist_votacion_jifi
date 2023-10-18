    //Eliminacion de listas
    $(document).ready(function () {
        $(".eliminar").on("click", function () {
            let id = $(this).val();
            
           $.ajax({
            method: 'POST',
            url: 'eliminar_cde.php',
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
            });
        });
    });


 