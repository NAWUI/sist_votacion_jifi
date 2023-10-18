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
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\style_login.css">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\style.index.css">
    <link rel="stylesheet" href="css\all.min.css">

    <link rel="stylesheet" href="css\w3.css">
    <title>Bienvenido</title>

</head>
<body>

           <!-- HEADER INICIO -->
           <?php 
                include("header_user.php");
            ?>
           
        <!-- HEADER FIN -->
      
<?php
include 'connection.php';



$query = "SELECT fase_fases FROM tbl_fases LIMIT 1";
$fase = mysqli_query($conn, $query);
$row_fase = mysqli_fetch_array($fase);
echo '<script> 
                      console.log('.$row_fase['fase_fases'].'); 
                    </script>';

// $sql = "SELECT * FROM tbl_alumnos WHERE dni_almn = " . $_SESSION['dni'];
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);



$select_product = mysqli_query($conn, "SELECT * FROM `tbl_alumnos` INNER JOIN `tbl_registro_voto` ON `tbl_alumnos`.`dni` = `tbl_registro_voto`.`dni_almn` WHERE `tbl_alumnos`.`dni` = '$dni_usr'");
$fetch_produc = mysqli_fetch_assoc($select_product);
$alumno =  $name_usr. " " .$sname_usr;
$voto = $fetch_produc['voto_almn'];

switch ($row_fase['fase_fases']) {
    case 0:
        echo '<script> function miFuncion() {swal({icon: "info",text: "Aun no puede Votar, Se estan cargando las listas del centro de Estudiantes, se le avisara cuando pueda Votar ." ,}).then(function(){ window.location = "logout.php"; })}</script>';
        echo "<script>setTimeout(miFuncion, 500);</script>"; 
        break;
    case 1:
 if ($voto == 0) {
?>

  <div class="container-fluid">
   <div class="row">

         <div class="col-md-12">
            <section class="products">

            <h1 class="heading">Bienvenido: <?php echo $alumno; ?> </h1>

            <div class="box-container">

               <?php
               $select_listas = mysqli_query($conn, "SELECT * FROM `tbl_listas` WHERE NOT color = 'voto en blanco'");
               if(mysqli_num_rows($select_listas) > 0){
                  while($fetch_listas = mysqli_fetch_assoc($select_listas)){
                     $val_mod = $fetch_listas['color'];
                     $val = $fetch_listas['id'];
                  if ($fetch_listas['habilitada'] == 1){
               
               ?>

               <form action="" method="post">
               <div class="box">
                  <h3>Lista <?php echo $fetch_listas['color']; ?></h3>

                  <input type="button" class="btn-check open" id="<?php echo $val_mod; ?>" value="<?php echo $val_mod; ?>" autocomplete="off">

                  <label class="btn btn-outline-success" for="<?php echo $val_mod; ?>">Ver propuesta</label>

                  <input type="checkbox" class="btn-check" id="<?php echo $val; ?>" value= "<?php echo $val; ?>" autocomplete="off">
                  <label class="btn btn-outline-success" for="<?php echo $val; ?>">Seleccionar</label>
                 </div>
               </form>

               <?php
                     };
                  };
                  ?>
                  
                  <div class="box">
                  <h3>Voto en blanco</h3>

                  <input type="checkbox" class="btn-check" id="votob" value="1" autocomplete="off">
                  <label class="btn btn-outline-success" for="votob">Seleccionar</label>
                  </div>
                  </form>
                  <?php
               };
               ?>  
            </div>
          </section>
          <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6" style="display: flex; justify-content: center;">

               <button type="submit" id="botonV" class="btn btn-success" style="width: 50%; ">Votar</button>

            </div>
            <div class="col-md-3">

            </div>
         </div>
      </div>
   </div>
  </div>
 <?php
   }else if(1 == $voto){
      echo '<script> function miFuncion() {swal({icon: "info",text: "Usted ya ha votado. Se cerrará esta sesión." ,}).then(function(){ window.location = "logout.php"; })}</script>';
      echo "<script>setTimeout(miFuncion, 100);</script>";  
   };

break;
case 2:

   $recount = mysqli_query($conn, "SELECT * FROM `tbl_listas` ORDER BY `contadorVotos` DESC LIMIT 1 ");
   $row_recount =  mysqli_fetch_assoc($recount);
?>
<h1 class="heading">Ganador:</h1>




<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow">
        <div class="card-body text-center">
          <p class="h4">Lista <?php echo $row_recount['color'] ?></p>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
break;
}
   ?>

    <!-- Modal para la entrada de datos -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script src="js/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script>
    const openModalButtons = document.querySelectorAll(".open");
    const modalContent = document.getElementById("modalContent");

    openModalButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Obtén el valor del ID del botón
            const buttonId = button.id;

            // Realiza una solicitud AJAX para obtener los datos de la base de datos
            $.ajax({
                url: 'modal_cont.php', // Reemplaza 'obtener_datos.php' con la URL de tu script de servidor para obtener datos
                method: 'POST',
                data: { color: buttonId },
                success: function (response) {
                    // Actualiza el contenido del modal con los datos obtenidos
                    modalContent.innerHTML = response;
                    // Muestra el modal
                    $('#myModal').modal('show');
                },
                error: function (error) {
                    console.error("Error");
                }
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