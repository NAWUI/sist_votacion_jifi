<?php
@include 'connection.php';
include ("session.php");

$select_product = mysqli_query($conn, "SELECT tbl_alumnos.* , tbl_registro_voto.voto_almn FROM tbl_alumnos INNER JOIN tbl_registro_voto ON tbl_alumnos.dni = tbl_registro_voto.dni_almn WHERE `dni`= $dni_usr");
$fetch_produc = mysqli_fetch_assoc($select_product);
$alumno =  $name_usr. " " .$sname_usr;
$voto = $fetch_produc['voto'];
echo $voto;
?>

<?php
 if ($voto == 0) {
?>
  <div class="container-fluid">
   <div class="row">

         <div class="col-md-12">
            <section class="products">

            <h1 class="heading">Bienvenido: <?php echo $alumno; ?>  </h1>

            <div class="box-container">

               <?php
               
               $select_listas = mysqli_query($conn, "SELECT * FROM `tbl_listas`");
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
                  <h3>Voto en Blanco</h3>

                  <!-- <input type="button" class="btn-check open" id="<?php //echo $val_mod; ?>" value="<?php //echo $val_mod; ?>" autocomplete="off"> -->

                  <!-- <label class="btn btn-outline-success" for="<?php //echo $val_mod; ?>">Ver propuesta</label> -->

                  <input type="checkbox" class="btn-check" id="VotoB" value= "VotoB" autocomplete="off">
                  <label class="btn btn-outline-success" for="VotoB">Seleccionar</label>
                  </div>
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
   ?>

    <!-- Modal para la entrada de datos -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>

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
            const cue = <?php echo $cue_usr; ?>
            // Realiza una solicitud AJAX para obtener los datos de la base de datos
            $.ajax({
                url: 'modal_cont.php', // Reemplaza 'obtener_datos.php' con la URL de tu script de servidor para obtener datos
                method: 'POST',
                data: { color: buttonId,
                        cue: cue },
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
</body>
</html>