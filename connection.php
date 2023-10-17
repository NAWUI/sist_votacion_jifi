<?php
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
?>
