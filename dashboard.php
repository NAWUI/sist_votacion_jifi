<?php
    include("connection.php");
    include ("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de votacion</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/style_login.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
           <!-- HEADER INICIO -->
           <?php 
                include("header.php");
            ?>
           
        <!-- HEADER FIN -->
        <div class="content"> 
        <br>
      <br>
      <br>      
  <div class="container-fluid">

<div class="rounded p-4 bg-light">
  <div class="h-25">
      <div class="display-4 d-flex justify-content-center h-100 align-items-center">Formulario deecciones</div>
  </div>
  <form id="formularioElecciones">
      <div class="row">
          <div class="col-6 col-md-3">
              <!-- Columna izquierda -->
              <div class="form-group">
                  <label for="colorLista">Color de lista</label>
                  <input type="text" class="form-control" id="color" name="color">
              </div>
          </div>
              <div class="form-group">
                  <label for="propuesta">Propuesta</label>
                  <textarea class="form-control" id="propuesta" name="propuesta"></textarea>
              </div>
              
              <div class="row">
          <!-- Primera Columna -->
          <div class="col-12 col-md-4">
              <div class="form-group">
                  <label for="presidente">Presidente</label>
                  <input type="text" class="form-control" id="presidente" name="presidente">
              </div>
              <div class="form-group">
                  <label for="sec_administracion">Secretario de Administración</label>
                  <input type="text" class="form-control" id="sec_administracion" name="sec_administracion">
              </div>
              <div class="form-group">
                  <label for="sec_documentacion">Secretario de Documentación</label>
                  <input type="text" class="form-control" id="sec_documentacion" name="sec_documentacion">
              </div>
              <div class="form-group">
                  <label for="tesorero">Tesorero</label>
                  <input type="text" class="form-control" id="tesorero" name="tesorero">
              </div>
              
              <div class="form-group">
                  <label for="eventos_representante">Representante de Eventos</label>
                  <input type="text" class="form-control" id="eventos_representante" name="eventos_representante">
              </div>
              <div class="form-group">
                  <label for="eventos_vocal1">Vocal 1 de Eventos</label>
                  <input type="text" class="form-control" id="eventos_vocal1" name="eventos_vocal1">
              </div>
              <div class="form-group">
                  <label for="eventos_vocal2">Vocal 2 de Eventos</label>
                  <input type="text" class="form-control" id="eventos_vocal2" name="eventos_vocal2">
              </div>
          </div>
          <!-- Segunda Columna -->
          <div class="col-12 col-md-4">
              <div class="form-group">
                  <label for="vocal_programacion">Vocal de Programación</label>
                  <input type="text" class="form-control" id="vocal_programacion" name="vocal_programacion">
              </div>
              <div class="form-group">
                  <label for="vocal_construccion">Vocal de Construcción</label>
                  <input type="text" class="form-control" id="vocal_construccion" name="vocal_construccion">
              </div>
              <div class="form-group">
                  <label for="vocal_turismo">Vocal de Turismo</label>
                  <input type="text" class="form-control" id="vocal_turismo" name="vocal_turismo">
              </div>
              <div class="form-group">
                  <label for="vocal_cicloBasico1">Vocal de Ciclo Básico 1</label>
                  <input type="text" class="form-control" id="vocal_cicloBasico1" name="vocal_cicloBasico1">
              </div>
              <div class="form-group">
                  <label for="vocal_cicloBasico2">Vocal de Ciclo Básico 2</label>
                  <input type="text" class="form-control" id="vocal_cicloBasico2" name="vocal_cicloBasico2">
              </div>
              <div class="form-group">
                  <label for="olimp_representante">Representante de Olimpiadas</label>
                  <input type="text" class="form-control" id="olimp_representante" name="olimp_representante">
              </div>
              <div class="form-group">
                  <label for="olimp_vocal1">Vocal 1 de Olimpiadas</label>
                  <input type="text" class="form-control" id="olimp_vocal1" name="olimp_vocal1">
              </div>
              <div class="form-group">
                  <label for="olimp_vocal2">Vocal 2 de Olimpiadas</label>
                  <input type="text" class="form-control" id="olimp_vocal2" name="olimp_vocal2">
              </div>
          </div>
          <!-- Tercera Columna -->
          <div class="col-12 col-md-4">
             
              <div class="form-group">
                  <label for="prensa_representante">Representante de Prensa</label>
                  <input type="text" class="form-control" id="prensa_representante" name="prensa_representante">
              </div>
              <div class="form-group">
                  <label for="prensa_vocal1">Vocal 1 de Prensa</label>
                  <input type="text" class="form-control" id="prensa_vocal1" name="prensa_vocal1">
              </div>
              <div class="form-group">
                  <label for="prensa_vocal2">Vocal 2 de Prensa</label>
                  <input type="text" class="form-control" id="prensa_vocal2" name="prensa_vocal2">
              </div>
              <div class="form-group">
                  <label for="gyd_representante">Representante de Gyd</label>
                  <input type="text" class="form-control" id="gyd_representante" name="gyd_representante">
              </div>
              <div class="form-group">
                  <label for="gyd_vocal1">Vocal 1 de Gyd</label>
                  <input type="text" class="form-control" id="gyd_vocal1" name="gyd_vocal1">
              </div>
              <div class="form-group">
                  <label for="gyd_vocal2">Vocal 2 de Gyd</label>
                  <input type="text" class="form-control" id="gyd_vocal2" name="gyd_vocal2">
              </div>
              <div class="form-group">
                  <label for="prof_acesor">Profesor Asesor</label>
                  <input type="text" class="form-control" id="prof_acesor" name="prof_acesor">
              </div>
              <div class="form-group">
                  <label for="prof_acesorsup">Profesor Asesor Suplente</label>
                  <input type="text" class="form-control" id="prof_acesorsup" name="prof_acesorsup">
              </div>
          </div>
      </div>
      <!-- Botón de envío -->
      <button id="enviarFormulario" type="button" class="btn btn-primary">Enviar</button>
  </form>
</div>
</div>
</div>
<style>


</style>
    <div class="footer-wrapper">
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <h6>Sistema creado por los alumnos de 7mo C de la E.E.S.T N°1</h6>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>
<script src="js/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js\carga_lista.js"></script>

</html>
