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
    <title>Sistema de Jornadas Turísticas</title>
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
        <div class="container rounded border border-primary-subtle">

<?php
$query = "SELECT fase_fases FROM tbl_fases LIMIT 1";
$fase = mysqli_query($conn, $query);
$row_fase = mysqli_fetch_array($fase);
switch ($row_fase['fase_fases']) {
  case 0:
          echo '<div class="container" style="margin: 10%">
          <div class="row">
            <div class="col-md-auto">
            <div class="card text-center mb-3" style="width: 18rem;">
          <div class="card-body">
          <button value="0" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0 disabled">Fase de registro</button>
            <h5 class="card-title">Explicación</h5>
            <p class="card-text">Los alumnos podran registrarse, postularse o disvincularse del sistema.</p>
          </div>
        </div>
            </div>
            <div class="col-md-auto">
            <div class="card text-center mb-3" style="width: 18rem;">
          <div class="card-body">
          <button value="1" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0">Fase de votacion</button>
            <h5 class="card-title">Explicación</h5>
            <p class="card-text">Los alumnos podran Votar a un Compañero o al Voto en blanco</p>
            
          </div>
        </div>
            </div>
            <div class="col-md-auto">
            <div class="card text-center mb-3" style="width: 18rem;">
          <div class="card-body">
          <button value="2" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0">Fase de recuento</button>
            <h5 class="card-title">Explicación</h5>
            <p class="card-text">Los alumnos podran ver el Ganador del Curso</p>
           
          </div>
        </div>
            </div>
          </div>
        </div>';

      break;
  case 1:
      
          echo '<div class="container" style="margin: 10%">
          <div class="row">
            <div class="col-md-auto">
            <div class="card text-center mb-3" style="width: 18rem;">
          <div class="card-body">
          <button value="0" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0">Fase de registro</button>
            <h5 class="card-title">Explicación</h5>
            <p class="card-text">Los alumnos podran registrarse, postularse o disvincularse del sistema.</p>
          </div>
        </div>
            </div>
            <div class="col-md-auto">
            <div class="card text-center mb-3" style="width: 18rem;">
          <div class="card-body">
          <button value="1" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0 disabled">Fase de votacion</button>
            <h5 class="card-title">Explicación</h5>
            <p class="card-text">Los alumnos podran Votar a un Compañero o al Voto en blanco</p>
            
          </div>
        </div>
            </div>
            <div class="col-md-auto">
            <div class="card text-center mb-3" style="width: 18rem;">
          <div class="card-body">
          <button value="2" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0">Fase de recuento</button>
            <h5 class="card-title">Explicación</h5>
            <p class="card-text">Los alumnos podran ver el Ganador del Curso</p>
           
          </div>
        </div>
            </div>
          </div>
        </div>';
      
      break;
  case 2:
      echo '<div class="container" style="margin: 10%">
      <div class="row">
        <div class="col-md-auto">
        <div class="card text-center mb-3" style="width: 18rem;">
      <div class="card-body">
      <button value="0" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0">Fase de registro</button>
        <h5 class="card-title">Explicación</h5>
        <p class="card-text">Los alumnos podran registrarse, postularse o disvincularse del sistema.</p>
      </div>
    </div>
        </div>
        <div class="col-md-auto">
        <div class="card text-center mb-3" style="width: 18rem;">
      <div class="card-body">
      <button value="1" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0">Fase de votacion</button>
        <h5 class="card-title">Explicación</h5>
        <p class="card-text">Los alumnos podran Votar a un Compañero o al Voto en blanco</p>
        
      </div>
    </div>
        </div>
        <div class="col-md-auto">
        <div class="card text-center mb-3" style="width: 18rem;">
      <div class="card-body">
      <button value="2" type="button" style="margin-left 10px;" class="button btn btn-primary btn-lg mr-md-3 mb-2 mb-md-0 disabled">Fase de recuento</button>
        <h5 class="card-title">Explicación</h5>
        <p class="card-text">Los alumnos podran ver el Ganador del Curso</p>
       
      </div>
    </div>
        </div>
      </div>
    </div>';
      break;
}

?>
</div>
<script src="js/sweetalert.min.js"></script>
<script src="js/jquery.min.js"></script>

<script src="js/script.js"></script>
<script>
    
 $(document).ready(function () {
  $(".button").on("click", function () {
    let fase = $(this).val();
    console.log(fase);
    
    let alertaa = "";
    switch (fase) {
        case "0":
            alertaa = "Registro";
            break;
        case "1":
            alertaa = "Votacion";
            break;
        case "2":
            alertaa = "Recuento";
            break;
        default:
            break;
    }
    console.log(alertaa);
    swal({
      icon: "success",
      text: ("Fase cambiada a: "+alertaa),
    }).then(function(){ window.location.reload(); })
    // alert("Fase cambiada a: "+alertaa);
 
    $.ajax({
      method: 'POST',
      url: 'cambiar_fase.php',
      data: {
        fase: fase,
      },
      success: function (data) {
        console.log(data);
     
      },
    });
  });
});


</script>
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


</html>