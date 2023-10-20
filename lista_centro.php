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
      <div class="display-4 d-flex justify-content-center h-100 align-items-center">Listas CDE</div>
  </div>
  <br>
  <br>
  <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      <?php      
       $query = "SELECT * FROM `tbl_listas` WHERE `color`!= 'voto en blanco' ";
       $sql = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_array($sql)) {
        $id = $row['id'];
        $habilitada = $row['habilitada'];
      ?>
      <tr>
      <td>
        <div class="d-flex align-items-center">
          <div class="ms-3">
            <p class="fw-bold mb-1">Lista <?php  echo $row['color']; ?></p>
          </div>
        </div>
      </td>
      <td>
        <button id="<?php echo $id; ?>" value="<?php echo $id; ?>" class="btn btn-success open">Ver info</button>
      </td>
      <td>
        <a href="modif_cde.php?id=<?php echo $id; ?>"><button class="btn btn-secondary">Editar</button></a>
      </td>
      <td><?php
            if ($habilitada == 0) {
                echo '<button type="button" class="habilitar btn btn-primary" value="'.$id.'">Habilitar';
            } else {
                echo '<button type="button" class="habilitar btn btn-secondary" value="'.$id.'">Habilitado';
            };
            ?></button></a>
      </td>
      <td>
        <button class="eliminar btn btn-danger" id="<?php echo $id ?>" value="<?php echo $id ?>">Eliminar</button>
      </td>
      </tr>
    <?php
      };
    ?>
  
  </tbody>
</table>
</div>
</div>
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

        <!-- Modal informacion de listas -->
        <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>




</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js/verification.js"></script>
<script src="js/eliminar.js"></script>
<script src="js/sweetalert.min.js"></script>
<script>
    //Muestra de modal
    const openModalButtons = document.querySelectorAll(".open");
    const modalContent = document.getElementById("modalContent");

    openModalButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Obtén el valor del ID del botón
            const buttonId = button.id;
            
            // Realiza una solicitud AJAX para obtener los datos de la base de datos
            $.ajax({
                url: 'modal_cont.php',
                method: 'POST',
                data: { id: buttonId },
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
</html>
