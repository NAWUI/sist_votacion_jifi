<?php
include ('connection.php');
include ('session.php');
// include ('vote.php');
$nombre_lista = $_POST['id1'];
$nombre_lista_escaped = mysqli_real_escape_string($conn, $nombre_lista);
// $blanco = $_POST['id2'];
//echo $dnius;
    if ($nombre_lista == "VB"){
         $vblanco = mysqli_query($conn,"UPDATE tbl_registro_voto SET voto_almn = true WHERE dni_almn ='$dni_usr'");
         $suma_vot = mysqli_query($conn,"UPDATE tbl_listas SET contadorVotos=contadorVotos+1 WHERE color = 'voto en blanco'");


    } else {
        
        $Alumn_voto = mysqli_query($conn,"UPDATE tbl_registro_voto SET voto_almn = true WHERE dni_almn ='$dni_usr'");
        $suma_voto = mysqli_query($conn, "UPDATE tbl_listas SET contadorVotos = contadorVotos + 1 WHERE color = '$nombre_lista_escaped'");
   
    }


?>