<?php
include("connection.php");
//include("ajax.php");

//echo $numeroV;
// $id = $_POST['id1'];
// //include ("session.php");
// // secuencia que se encarga de traer de la base de datos los alumnos del curso
// $sql = mysqli_query($conn,"SELECT COUNT(*) AS `count` FROM `tbl_alumnos` WHERE NOT tbl_alumnos.nombre_almn = 'Voto en blanco' AND id_curso = $id AND baja_almn = 0");
// $data = mysqli_fetch_assoc($sql);
// $alumn = $data['count'];

//secuencia que se encarga de traer de la base de datos los alumnos del curso que votaron
// $sql1 = mysqli_query($conn,"SELECT COUNT(*) AS `count1` FROM `tbl_alumnos` WHERE NOT tbl_alumnos.nombre_almn = 'Voto en blanco' AND id_curso = $id AND voto_almn = 1");
// $data1 = mysqli_fetch_assoc($sql1);
// $votos = $data1['count1'];

// $resta = $alumn - $votos;

        $select_products = mysqli_query($conn, "SELECT color,contadorVotos FROM `tbl_listas` WHERE NOT color = 'Voto en blanco'");
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
             var_dump($fetch_product); // Add this line to see the array structure
            if (isset($fetch_product['habilitada']) && $fetch_product['habilitada'] == 1) {
                     $nombre_lista = $fetch_product['color'];
                     $etiquetas[] = $nombre_lista;

                     
        $select_voto = mysqli_query($conn, "SELECT color FROM `tbl_listas` WHERE color = $nombre_lista");
        
            while($fetch_voto = mysqli_fetch_assoc($select_voto)){
                 var_dump($fetch_voto);
                $voto = $fetch_voto['contadorVotos'];
                $datosVentas[] = $voto;
            }
        }
    }  


 ?>      

<div class="row">
    <div class="col">
    <div class="container rounded border border-primary-subtle" style="position: relative; width:350px;">

<section class="products">

<div class="box-container">
   <div aria-label="Basic example">
        <h3>Votos hasta el momento:<?php //echo $votos;?> </h3>
        
    </div>
</div>
<canvas id="grafica"></canvas>
</section>
</div>
    </div>

  </div>
<script>
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        // Pasaamos las etiquetas desde PHP
        const etiquetas = <?php echo json_encode($etiquetas) ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Votacion",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosVentas) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
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

    </script>
<!-- custom js file link  -->
<!--    <script src="chart.min.js"></script> -->

<script src="Chart.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>