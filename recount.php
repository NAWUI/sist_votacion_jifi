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
include("connection.php"); // Archivo de conexión a la base de datos

$etiquetas = []; // Inicializar el array de etiquetas
$datosVentas = []; // Inicializar el array de datos
$colores = []; // Inicializar el array de colores

$select_products = mysqli_query($conn, "SELECT color, contadorVotos FROM `tbl_listas` ");

if ($select_products) {
    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        $nombre_lista = $fetch_product['color'];
        $etiquetas[] = $nombre_lista;
        $datosVentas[] = $fetch_product['contadorVotos'];
        $total_votos = array_sum($datosVentas);
        // Definir colores basados en el nombre de la lista (puedes personalizar esta lógica)
        $colores[$nombre_lista] = obtenerColorParaLista($nombre_lista);
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

function obtenerColorParaLista($nombre_lista) {
    // Lógica para asignar colores basados en el nombre de la lista
    // Puedes tener un array de nombres y colores predefinidos aquí
    $colores_predefinidos = [
        'rojo' => 'red',
        'amarillo' => 'yellow',
        'azul' => 'blue',
        'verde' => 'green',
        'naranja' => 'orange',
        'rosa' => 'pink',
        'violeta' => 'violet',
        'morado' => 'purple',
        'marrón' => 'brown',
        'gris' => 'gray',
        'blanco' => 'white',
        'negro' => 'black',
        'turquesa' => 'turquoise',
        'cian' => 'cyan',
        'lavanda' => 'lavender',
        'oliva' => 'olive',
        'lima' => 'lime',
        'beige' => 'beige',
        'marfil' => 'ivory',
        'agual' => 'aqua',
        'salmon' => 'salmon',
        'oro' => 'gold',
        'plata' => 'silver',
        'café' => 'maroon',
        'gris oscuro' => 'darkgray',
        'gris claro' => 'lightgray',
        // Agrega más nombres y colores según tus necesidades
    ];

    // Si el nombre de la lista está en el array de colores predefinidos, devuelve el color correspondiente
    if (array_key_exists($nombre_lista, $colores_predefinidos)) {
        return $colores_predefinidos[$nombre_lista];
    } else {
        // Si el nombre de la lista no está en el array de colores predefinidos, devuelve un color por defecto
        return 'gray';
    }
}
?>
<style>



#leyendas-container .circulo {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 5px;
}

</style>  
<br><br>
<div class="row g-0 text-center">
  <div class="col-sm-6 col-md-8">
  <div class="container rounded border border-primary-subtle">
                <section class="products">
                    <div class="box-container">
                        <div aria-label="Basic example">
                            <h3>Votos hasta el momento: <?php echo $total_votos; ?></h3>
                        </div>
                    </div>
                    <canvas id="grafica"></canvas>
                    
                        
                </section>
            </div>
  </div>
 

  <div class="col-6 col-md-4">
  <div class="container rounded border border-primary-subtle">
             <table class="table">
  <thead>
    <tr>
      <th scope="col">Lista de C.D.E</th>
    </tr>
  </thead>                    
  <div class="leyendas" id="leyendas-container">
<?php foreach($etiquetas as $etiqueta): ?>
  <tbody>
    <tr>
      <th scope="row" class="circulo" style="background-color: <?php echo $colores[$etiqueta]; ?>"></th>
      <td> <?php echo $etiqueta; ?></td>

   

            

    <?php endforeach; ?>
     </tr>
    </tbody>
</table>  
    </div>
  </div>
</div>
<script src="Chart.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script>
const etiquetas = <?php echo json_encode($etiquetas); ?>;
const datosVentas = <?php echo json_encode($datosVentas); ?>;
const colores = <?php echo json_encode($colores); ?>;

const grafica = document.querySelector("#grafica");

        const datos = {
            labels: etiquetas,
            datasets: [{
                data: datosVentas,
                backgroundColor: etiquetas.map(nombreLista => colores[nombreLista]),
                borderWidth: 3,
            }]
        };

        const opciones = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            },
        };

        new Chart(grafica, {
            type: 'doughnut',
            data: datos,
            options: opciones
        });
    </script>
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
</body>
</html>