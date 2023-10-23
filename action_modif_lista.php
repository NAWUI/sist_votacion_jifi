<?php

include("connection.php");

$id = mysqli_real_escape_string($conn, $_POST['id_cde']);
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
    $check_query = "SELECT * FROM `tbl_listas` WHERE
    `presidente`='$presidente' OR
    `sec_administracion`='$sec_administracion' OR
    `sec_documentacion`='$sec_documentacion' OR
    `tesorero`='$tesorero' OR
    `vocal_programacion`='$vocal_programacion' OR
    `vocal_construccion`='$vocal_construccion' OR
    `vocal_turismo`='$vocal_turismo' OR
    `vocal_cicloBasico1`='$vocal_cicloBasico1' OR
    `vocal_cicloBasico2`='$vocal_cicloBasico2' OR
    `olimp_representante`='$olimp_representante' OR
    `olimp_vocal1`='$olimp_vocal1' OR
    `olimp_vocal2`='$olimp_vocal2' OR
    `eventos_representante`='$eventos_representante' OR
    `eventos_vocal1`='$eventos_vocal1' OR
    `eventos_vocal2`='$eventos_vocal2' OR
    `prensa_representante`='$prensa_representante' OR
    `prensa_vocal1`='$prensa_vocal1' OR
    `prensa_vocal2`='$prensa_vocal2' OR
    `gyd_representante`='$gyd_representante' OR
    `gyd_vocal1`='$gyd_vocal1' OR
    `gyd_vocal2`='$gyd_vocal2' OR
    `prof_acesor`='$prof_acesor' OR
    `prof_acesorsup`='$prof_acesorsup'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) == 0) {
        // No existe un registro con color 'voto en blanco', insertar nuevo registro
        $sql = "UPDATE `tbl_listas` 
        SET 
          `id` != '$color',
          `propuesta`='$propuesta',
          `presidente`='$presidente',
          `sec_administracion`='$sec_administracion',
          `sec_documentacion`='$sec_documentacion',
          `tesorero`='$tesorero',
          `vocal_programacion`='$vocal_programacion',
          `vocal_construccion`='$vocal_construccion',
          `vocal_turismo`='$vocal_turismo',
          `vocal_cicloBasico1`='$vocal_cicloBasico1',
          `vocal_cicloBasico2`='$vocal_cicloBasico2',
          `olimp_representante`='$olimp_representante',
          `olimp_vocal1`='$olimp_vocal1',
          `olimp_vocal2`='$olimp_vocal2',
          `eventos_representante`='$eventos_representante',
          `eventos_vocal1`='$eventos_vocal1',
          `eventos_vocal2`='$eventos_vocal2',
          `prensa_representante`='$prensa_representante',
          `prensa_vocal1`='$prensa_vocal1',
          `prensa_vocal2`='$prensa_vocal2',
          `gyd_representante`='$gyd_representante',
          `gyd_vocal1`='$gyd_vocal1',
          `gyd_vocal2`='$gyd_vocal2',
          `prof_acesor`='$prof_acesor',
          `prof_acesorsup`='$prof_acesorsup'
            WHERE id = '$id'
        ";
        if (mysqli_query($conn, $sql)) {
            echo "Exito";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }else{
        echo 'Se ha repetido un DNI de otra lista.';
}
}    

$conn->close();
?>
