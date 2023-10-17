$(document).ready(function(){
    $("#password").keyup(function(event) {
        if (event.which === 13) {
            $("#login").click();
        };
    });
    $("#login").click(function() {
        var dni = $("#dni").val();
        var password = $("#password").val();
        $.ajax({
            method: "POST",
            url: "login_action.php",
            data: {
                dni: dni,
                password: password
            },
            success: function(data) {
                console.log(data);
                // alert(data);
                if (data == "Bienvenido"){
                    swal({
                        icon: "success",
                        title: (data),
                        timer: 1100,
                        button: false,
                        }).then(function(){
                            window.location = "session_login.php";
                        })    
                   
                }else if((data) == "DNI o Contraseña inválidos"){
                    swal({
                        icon: "error",
                        text: (data),
                        timer: 1500,
                        button: false,
                        });
                }
            }
        });
    });
});
