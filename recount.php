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
<?php
include("connection.php");

 $sql = mysqli_query($conn,"SELECT COUNT(*) AS `count` FROM `tbl_registro_voto` WHERE voto_almn = 1");
 $data = mysqli_fetch_assoc($sql);
 $votos = $data['count'];
 echo $votos;


        $select_products = mysqli_query($conn, "SELECT * FROM `tbl_listas`");
        while($fetch_product = mysqli_fetch_assoc($select_products)){
           
            if ($fetch_product['habilitada'] == 0){
                     $nombre_lista = $fetch_product['color'];
                     $etiquetas[] = $nombre_lista;
                     
        $select_voto = mysqli_query($conn, "SELECT * FROM `tbl_listas` WHERE color = '$nombre_lista'");
        if($select_voto->num_rows > 0){
            while($fetch_voto = mysqli_fetch_assoc($select_voto)){
                $voto = $fetch_voto['contadorVotos'];
                $datosVentas[] = $voto;
            }
        }
    }
    }  

 
                 
    $select_voto1 = mysqli_query($conn, "SELECT * FROM `tbl_listas` where color = 'voto en blanco'");
    if($select_voto1->num_rows > 0){
        while($fetch_voto1 = mysqli_fetch_assoc($select_voto1)){
            $voto1 = $fetch_voto1['contadorVotos'];
            $etiquetas1[] = 'Voto en blanco';
            $datosVentas1[] = $voto1;
                     };
            }

// // Tu consulta SQL para obtener los datos
// $select_datos = mysqli_query($conn, "SELECT * FROM `tbl_listas` WHERE NOT color = 'voto en blanco'");

// // Comprobar si hay resultados
// if ($select_datos->num_rows > 0) {
//     while($row = mysqli_fetch_assoc($select_datos)) {
//         // Obtener los datos de cada fila
//         $voto = $row['color']; // Reemplaza 'votos' con el nombre real de la columna en tu base de datos
?>


        <div class="container rounded border border-primary-subtle" style="position: relative; width:350px;">
            <section class="products">
                <div class="box-container">
                    <div aria-label="Basic example">
                        <h3>Votos hasta el momento: <?php echo $voto; ?></h3>
                    </div>
                </div>
                <canvas id="grafica"></canvas>
            </section>

</div>
<br>
<?php
//     }
// } else {
//     // Mostrar un mensaje si no hay resultados
//     echo "No se encontraron resultados.";
// }

// // Cerrar la conexión a la base de datos
// mysqli_close($conn);
?>

    
    <div class="col">
    <div class="container rounded border border-primary-subtle" style="position: relative; width:350px">

<section class="products">

<div class="box-container">
   <div aria-label="Basic example">
        <h3>Votos en blanco</h3>
    </div>
</div>
<canvas id="grafica1"></canvas>
<br>
</section>
</div>
    </div>
  </div>


<script>
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        const $grafica1 = document.querySelector("#grafica1");
        // Pasaamos las etiquetas desde PHP
        const etiquetas = <?php echo json_encode($etiquetas); ?>;
        const etiquetas1 = <?php echo json_encode($etiquetas1); ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Votacion",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosVentas) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        const datosVentas20201 = {
            label: "Votacion",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosVentas1) ?>,
            backgroundColor: 'rgba(120, 120, 120, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'doughnut', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
        new Chart($grafica1, {
            type: 'doughnut', // Tipo de gráfica
            data: {
                labels: etiquetas1,
                datasets: [
                    datosVentas20201,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>
<!-- custom js file link  -->
<!--    <script src="chart.min.js"></script> -->
<script src="js/chart.min.js"></script>

</body>
<script src="js/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js\carga_lista.js"></script>

</html>