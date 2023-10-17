<?php

session_start();

include("connection.php");
$dni = mysqli_real_escape_string($conn, $_POST['dni']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM `tbl_alumnos` WHERE dni= '$dni' and clave= '$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count == 1) {
    $_SESSION['dni'] = $row['dni'];
    echo "Bienvenido";
 }else {
    echo "DNI o Contraseña inválidos";
 }

$conn->close();
?>
