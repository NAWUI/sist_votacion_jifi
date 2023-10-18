<?php

include("connection.php");

$color = mysqli_real_escape_string($conn, $_POST['color']);
$propuesta = mysqli_real_escape_string($conn, $_POST['propuesta']);
$presidente = mysqli_real_escape_string($conn, $_POST['presidente']);
$sec_administracion = mysqli_real_escape_string($conn, $_POST['sec_administracion']);
$sec_documentacion = mysqli_real_escape_string($conn, $_POST['sec_documentacion']);
$tesorero = mysqli_real_escape_string($conn, $_POST['tesorero']);
$vocal_programacion = mysqli_real_escape_string($conn, $_POST['vocal_programacion']);
$vocal_construccion = mysqli_real_escape_string($conn, $_POST['vocal_construccion']);
$vocal_turismo = mysqli_real_escape_string($conn, $_POST['vocal_turismo']);
$vocal_cicloBasico1 = mysqli_real_escape_string($conn, $_POST['vocal_cicloBasico1']);
$vocal_cicloBasico2 = mysqli_real_escape_string($conn, $_POST['vocal_cicloBasico2']);
$olimp_representante = mysqli_real_escape_string($conn, $_POST['olimp_representante']);
$olimp_vocal1 = mysqli_real_escape_string($conn, $_POST['olimp_vocal1']);
$olimp_vocal2 = mysqli_real_escape_string($conn, $_POST['olimp_vocal2']);
$eventos_representante = mysqli_real_escape_string($conn, $_POST['eventos_representante']);
$eventos_vocal1 = mysqli_real_escape_string($conn, $_POST['eventos_vocal1']);
$eventos_vocal2 = mysqli_real_escape_string($conn, $_POST['eventos_vocal2']);
$prensa_representante = mysqli_real_escape_string($conn, $_POST['prensa_representante']);
$prensa_vocal1 = mysqli_real_escape_string($conn, $_POST['prensa_vocal1']);
$prensa_vocal2 = mysqli_real_escape_string($conn, $_POST['prensa_vocal2']);
$gyd_representante = mysqli_real_escape_string($conn, $_POST['gyd_representante']);
$gyd_vocal1 = mysqli_real_escape_string($conn, $_POST['gyd_vocal1']);
$gyd_vocal2 = mysqli_real_escape_string($conn, $_POST['gyd_vocal2']);
$prof_acesor = mysqli_real_escape_string($conn, $_POST['prof_acesor']);
$prof_acesorsup = mysqli_real_escape_string($conn, $_POST['prof_acesorsup']);
if (empty($color) || empty($propuesta) || empty($presidente) || empty($sec_administracion) || empty($sec_documentacion) || empty($tesorero) || empty($vocal_programacion) || empty($vocal_construccion) || empty($vocal_turismo) || empty($vocal_cicloBasico1) || empty($vocal_cicloBasico2) || empty($olimp_representante) || empty($olimp_vocal1) || empty($olimp_vocal2) || empty($eventos_representante) || empty($eventos_vocal1) || empty($eventos_vocal2) || empty($prensa_representante) || empty($prensa_vocal1) || empty($prensa_vocal2) || empty($gyd_representante) || empty($gyd_vocal1) || empty($gyd_vocal2) || empty($prof_acesor) || empty($prof_acesorsup)) {
    echo "Rellene todos los campos.";
} else {
    $check_query = "SELECT * FROM `tbl_listas` WHERE `color` = 'voto en blanco'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) == 0) {
        // No existe un registro con color 'voto en blanco', insertar nuevo registro
        $sql = "INSERT INTO `tbl_listas`(`color`, `habilitada`, `contadorVotos`) VALUES ('voto en blanco', 1, 0)";
        $sql1 = "INSERT INTO `tbl_listas`(`color`, `propuesta`, `presidente`, `sec_administracion`, `sec_documentacion`, `tesorero`, `vocal_programacion`, `vocal_construccion`, `vocal_turismo`, `vocal_cicloBasico1`, `vocal_cicloBasico2`, `olimp_representante`, `olimp_vocal1`, `olimp_vocal2`, `eventos_representante`, `eventos_vocal1`, `eventos_vocal2`, `prensa_representante`, `prensa_vocal1`, `prensa_vocal2`, `gyd_representante`, `gyd_vocal1`, `gyd_vocal2`, `prof_acesor`, `prof_acesorsup`, `habilitada`, `contadorVotos`) VALUES ('$color','$propuesta','$presidente','$sec_administracion','$sec_documentacion','$tesorero','$vocal_programacion','$vocal_construccion','$vocal_turismo','$vocal_cicloBasico1','$vocal_cicloBasico2','$olimp_representante','$olimp_vocal1','$olimp_vocal2','$eventos_representante','$eventos_vocal1','$eventos_vocal2','$prensa_representante','$prensa_vocal1','$prensa_vocal2','$gyd_representante','$gyd_vocal1','$gyd_vocal2','$prof_acesor','$prof_acesorsup',0,0)";
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
            echo "Exito";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }else{
$sql = "INSERT INTO `tbl_listas`(`color`, `propuesta`, `presidente`, `sec_administracion`, `sec_documentacion`, `tesorero`, `vocal_programacion`, `vocal_construccion`, `vocal_turismo`, `vocal_cicloBasico1`, `vocal_cicloBasico2`, `olimp_representante`, `olimp_vocal1`, `olimp_vocal2`, `eventos_representante`, `eventos_vocal1`, `eventos_vocal2`, `prensa_representante`, `prensa_vocal1`, `prensa_vocal2`, `gyd_representante`, `gyd_vocal1`, `gyd_vocal2`, `prof_acesor`, `prof_acesorsup`, `habilitada`, `contadorVotos`) VALUES ('$color','$propuesta','$presidente','$sec_administracion','$sec_documentacion','$tesorero','$vocal_programacion','$vocal_construccion','$vocal_turismo','$vocal_cicloBasico1','$vocal_cicloBasico2','$olimp_representante','$olimp_vocal1','$olimp_vocal2','$eventos_representante','$eventos_vocal1','$eventos_vocal2','$prensa_representante','$prensa_vocal1','$prensa_vocal2','$gyd_representante','$gyd_vocal1','$gyd_vocal2','$prof_acesor','$prof_acesorsup',0,0)";

if (mysqli_query($conn, $sql)) {
    echo "Exito";
} else {
    echo "Error: " . mysqli_error($conn);
}
}
}    

$conn->close();
?>
