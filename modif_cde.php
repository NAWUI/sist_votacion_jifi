<?php
    include("connection.php");
    include ("session.php");

    $id_cde = $_GET['id'];

    $sql = mysqli_query($conn, ("SELECT * FROM `tbl_listas` WHERE id = '$id_cde'"));
    $row = mysqli_fetch_assoc($sql);

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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
      <div class="display-4 d-flex justify-content-center h-100 align-items-center">Modificacion: Lista <?php echo $row['color']; ?></div>
  </div>
  <br>
  <br>
  <form id="formularioElecciones">
      <div class="row">
          <div class="col-6 col-md-3">
              <!-- Columna izquierda -->
              <div class="form-group">
                  <label for="colorLista">Color de lista</label>
                  <input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>">
              </div>
          </div>
              <div class="form-group">
                  <label for="propuesta">Propuesta</label>
                  <textarea class="form-control" id="propuesta" name="propuesta"><?php echo $row['propuesta']; ?></textarea>
              </div>
              
              <div class="row">
          <!-- Primera Columna -->
          <div class="col-12 col-md-4">
    <div class="form-group">
        <label for="presidente">Presidente</label>
        <select class="form-select" id="presidente" name="presidente">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['presidente']; ?>selected><?php echo $row['presidente']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="sec_administracion">Secretario de Administración</label>
        <select class="form-select" id="sec_administracion" name="sec_administracion">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['sec_administracion']; ?>selected><?php echo $row['sec_administracion']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="sec_documentacion">Secretario de Documentación</label>
        <select class="form-select" id="sec_documentacion" name="sec_documentacion">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['sec_documentacion']; ?>selected><?php echo $row['sec_documentacion']; ?></option>
            
        </select>
    </div>
    <div class="form-group">
        <label for="tesorero">Tesorero</label>
        <select class="form-select" id="tesorero" name="tesorero">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['tesorero']; ?>selected><?php echo $row['tesorero']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="eventos_representante">Representante de Eventos</label>
        <select class="form-select" id="eventos_representante" name="eventos_representante" >
        <option value<?php echo $row['eventos_representante']; ?>selected><?php echo $row['eventos_representante']; ?></option>

            <!-- Add options for the select element if needed -->
        </select>
    </div>
    <div class="form-group">
        <label for="eventos_vocal1">Vocal 1 de Eventos</label>
        <select class="form-select" id="eventos_vocal1" name="eventos_vocal1">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['eventos_vocal1']; ?>selected><?php echo $row['eventos_vocal1']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="eventos_vocal2">Vocal 2 de Eventos</label>
        <select class="form-select" id="eventos_vocal2" name="eventos_vocal2" >
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['eventos_vocal2']; ?>selected><?php echo $row['eventos_vocal2']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <select style="display: none;" class="form-select" id="id_cde" name="id_cde">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $id_cde; ?>selected><?php echo $id_cde; ?></option>
        </select>
    </div>
</div>

<!-- Segunda Columna -->
<div class="col-12 col-md-4">
    <div class="form-group">
        <label for="vocal_programacion">Vocal de Programación</label>
        <select class="form-select" id="vocal_programacion" name="vocal_programacion">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['vocal_programacion']; ?>selected><?php echo $row['vocal_programacion']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="vocal_construccion">Vocal de Construcción</label>
        <select class="form-select" id="vocal_construccion" name="vocal_construccion" >
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['vocal_construccion']; ?>selected><?php echo $row['vocal_construccion']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="vocal_turismo">Vocal de Turismo</label>
        <select class="form-select" id="vocal_turismo" name="vocal_turismo">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['vocal_turismo']; ?>selected><?php echo $row['vocal_turismo']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="vocal_cicloBasico1">Vocal de Ciclo Básico 1</label>
        <select class="form-select" id="vocal_cicloBasico1" name="vocal_cicloBasico1">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['vocal_cicloBasico1']; ?>selected><?php echo $row['vocal_cicloBasico1']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="vocal_cicloBasico2">Vocal de Ciclo Básico 2</label>
        <select class="form-select" id="vocal_cicloBasico2" name="vocal_cicloBasico2">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['vocal_cicloBasico2']; ?>selected><?php echo $row['vocal_cicloBasico2']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="olimp_representante">Representante de Olimpiadas</label>
        <select class="form-select" id="olimp_representante" name="olimp_representante">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['olimp_representante']; ?>selected><?php echo $row['olimp_representante']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="olimp_vocal1">Vocal 1 de Olimpiadas</label>
        <select class="form-select" id="olimp_vocal1" name="olimp_vocal1" >
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['olimp_vocal1']; ?>selected><?php echo $row['olimp_vocal1']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="olimp_vocal2">Vocal 2 de Olimpiadas</label>
        <select class="form-select" id="olimp_vocal2" name="olimp_vocal2">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['olimp_vocal2']; ?>selected><?php echo $row['olimp_vocal2']; ?></option>

        </select>
    </div>
</div>

<!-- Tercera Columna -->
<div class="col-12 col-md-4">
    <div class="form-group">
        <label for="prensa_representante">Representante de Prensa</label>
        <select class="form-select" id="prensa_representante" name="prensa_representante"> 
        <!-- Add options for the select element if needed -->
        <option value<?php echo $row['prensa_representante']; ?>selected><?php echo $row['prensa_representante']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="prensa_vocal1">Vocal 1 de Prensa</label>
        <select class="form-select" id="prensa_vocal1" name="prensa_vocal1">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['prensa_vocal1']; ?>selected><?php echo $row['prensa_vocal1']; ?></option>

        </select>
    </div>
    <div class="form-group">
        <label for="prensa_vocal2">Vocal 2 de Prensa</label>
        <select class="form-select" id="prensa_vocal2" name="prensa_vocal2">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['prensa_vocal2']; ?>selected><?php echo $row['prensa_vocal2']; ?></option>
        
        </select>
    </div>
    <div class="form-group">
        <label for="gyd_representante">Representante de Gyd</label>
        <select class="form-select" id="gyd_representante" name="gyd_representante">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['gyd_representante']; ?>selected><?php echo $row['gyd_representante']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="gyd_vocal1">Vocal 1 de Gyd</label>
        <select class="form-select" id="gyd_vocal1" name="gyd_vocal1">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['gyd_vocal1']; ?>selected><?php echo $row['gyd_vocal1']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="gyd_vocal2">Vocal 2 de Gyd</label>
        <select class="form-select" id="gyd_vocal2" name="gyd_vocal2">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['gyd_vocal2']; ?>selected><?php echo $row['gyd_vocal2']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="prof_acesor">Profesor Asesor</label>
        <select class="form-select" id="prof_acesor" name="prof_acesor">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['prof_acesor']; ?>selected><?php echo $row['prof_acesor']; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="prof_acesorsup">Profesor Asesor Suplente</label>
        <select class="form-select" id="prof_acesorsup" name="prof_acesorsup">
            <!-- Add options for the select element if needed -->
            <option value<?php echo $row['prof_acesorsup']; ?>selected><?php echo $row['prof_acesorsup']; ?></option>

        </select>
    </div>
</div>

      </div>
  </form>

</div>
<button id="enviarFormulario" type="button" class="btn btn-primary">Enviar</button>
</div>
</div>
  
</div>
</div>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="footer-wrapper">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<script src="js/busqueda_prof.js"></script>
<script src="js/busqueda.js"></script>
<script src="js/script.js"></script>
<script src="js/modif_lista.js"></script>
<script src="js/sweetalert.min.js"></script>
</html>
