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
    $color_check = "SELECT * FROM `tbl_listas` WHERE id != '$id' AND color = '$color' ";
    $color_result = mysqli_query($conn, $color_check);

    if (mysqli_num_rows($color_result) > 0) {
        echo 'Nombre de lista repetido.';
    } else {
        $check_query = "SELECT * FROM `tbl_listas` WHERE
    `id` != '$id' AND
    `color` = '$color' AND
    `presidente`='$presidente' AND
    `sec_administracion`='$sec_administracion' AND
    `sec_documentacion`='$sec_documentacion' AND
    `tesorero`='$tesorero' AND
    `vocal_programacion`='$vocal_programacion' AND
    `vocal_construccion`='$vocal_construccion' AND
    `vocal_turismo`='$vocal_turismo' AND
    `vocal_cicloBasico1`='$vocal_cicloBasico1' AND
    `vocal_cicloBasico2`='$vocal_cicloBasico2' AND
    `olimp_representante`='$olimp_representante' AND
    `olimp_vocal1`='$olimp_vocal1' AND
    `olimp_vocal2`='$olimp_vocal2' AND
    `eventos_representante`='$eventos_representante' AND
    `eventos_vocal1`='$eventos_vocal1' AND
    `eventos_vocal2`='$eventos_vocal2' AND
    `prensa_representante`='$prensa_representante' AND
    `prensa_vocal1`='$prensa_vocal1' AND
    `prensa_vocal2`='$prensa_vocal2' AND
    `gyd_representante`='$gyd_representante' AND
    `gyd_vocal1`='$gyd_vocal1' AND
    `gyd_vocal2`='$gyd_vocal2' AND
    `prof_acesor`='$prof_acesor' AND
    `prof_acesorsup`='$prof_acesorsup'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) == 0) {
        // No existe un registro con color 'voto en blanco', insertar nuevo registro
        $sql = "UPDATE `tbl_listas` 
        SET 
          `color`='$color',
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
        echo 'DNI o nombre de lista repetidos.';
}
    }
}    

$conn->close();
?>
