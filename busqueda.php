<?php
// Conectar a la base de datos MySQL
$servername = "localhost"; // nombre del servidor donde está alojada la base de datos
$username = "root"; // nombre de usuario para acceder a la base de datos
$password = ""; // contraseña del usuario
$dbname = "sist_votacion_cde"; // nombre de la base de datos a la que se conectará

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
/*
// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
*/
// Obtener el valor del campo de entrada (término de búsqueda)
$query = $_GET['term'];

// Consulta SQL para buscar registros relacionados con el término de búsqueda
$sql = "SELECT * FROM tbl_alumnos WHERE dni LIKE '%$query%'";
$resultado = mysqli_query($conn, $sql);

// Almacena los resultados en un array

$resultados = [];
while($fila = mysqli_fetch_assoc($resultado)){
    $resultados[] = [
        'id' => $fila['dni'], // dni del elemento, puede ser el campo 'id' de tu base de datos
        'text' => $fila['nombre'] // Texto que se mostrará en la lista desplegable
    ];
}

echo json_encode($resultados);

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

