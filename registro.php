<?php
include('connection.php');
include('session.php');
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Jornadas Turísticas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="js/node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>
<body>
            <!-- HEADER INICIO -->
            <?php 
                include("header.php");
            ?>
            
        <!-- HEADER FIN -->

        
        <div class="custom-container">
        <h2>Formulario de Registro</h2>
        <form>
            <div class="custom-form-group">
                <label for="nombre" class="custom-form-label">Nombre</label>
                <input type="text" class="custom-form-control" id="nombre" placeholder="Nombre">
            </div>
            <div class="custom-form-group">
                <label for="contraseña" class="custom-form-label">Contraseña</label>
                <input type="password" class="custom-form-control" id="password" placeholder="Contraseña">
            </div>
            <div class="custom-form-group">
                <label for="correo" class="custom-form-label">Correo electrónico</label>
                <input type="email" class="custom-form-control" id="correo" placeholder="Correo electrónico">
            </div>
            <br>
            <div class="custom-btn-container"> <!-- Contenedor para el botón -->
                <button type="button" id='enviar' class="custom-btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="js/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="js/script.js"></script>
<script src="js/registro.js"></script>
</html>