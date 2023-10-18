<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href=".\node_modules\bootstrap\dist\css\bootstrap.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login</title>
</head>
<body>


    <nav class="navbar navbar-expand-sm navbar-light navbarA">
    <h2 style="color: white;
                margin-left: 4%">Sistema de votacion digital</h2>
      </nav>

 

      <div class="add-product-form">
    <h2 style="text-align: center;">Login Alumno</h2>
    <div class="container">
        <div class="form-group">
            <label for="dni"><h4>DNI</h4></label>
            <input type="text" class="box" id="dni" placeholder="DNI" autocomplete="off" name="dni" required>
            <div class="invalid-feedback">
                Ingrese su DNI.
            </div>
        </div>
        <div class="form-group">
            <label for="password"><h4>Contraseña</h4></label>
            <input type="password" class="box" id="password" placeholder="Contraseña" autocomplete="off" name="password" required>
            <div class="invalid-feedback">
                Ingrese su contraseña.
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="login">Ingresar</button>
        <br>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/login.js"></script>
    </div>


    <!-- Remove the container if you want to extend the Footer to full width. -->
        <div class="" style="
        position:   fixed;
        bottom: 0; 
        width:100%;">
            <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    <h6>Sistema creado por los alumnos de 7mo C de la E.E.S.T N°1</h6>
                </div>
                <!-- Copyright -->
            </footer>
    </div>
    <!-- End of .container -->


    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</html>