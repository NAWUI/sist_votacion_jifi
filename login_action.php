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
    $sql_test = "SELECT * FROM `tbl_registro_voto` WHERE dni_almn = '$dni'";
   $result_test = mysqli_query($conn,$sql_test);
   $count_test = mysqli_num_rows($result_test);
if ($count_test == 1){
   echo "Bienvenido";

}else{
   $sql = "INSERT INTO `tbl_registro_voto`(`dni_almn`, `voto_almn`) VALUES ('$dni','0')";
   $result = mysqli_query($conn,$sql);
   echo "Bienvenido";
}

 }else {
    echo "DNI o Contraseña inválidos";
 }

$conn->close();
?>
