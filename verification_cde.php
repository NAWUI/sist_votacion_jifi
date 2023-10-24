<?php
include("connection.php");

$id = mysqli_real_escape_string($conn, $_POST['id']);

// Consulta para verificar DNI duplicados con cargos
$dniCheckQuery = mysqli_query($conn, "SELECT * FROM tbl_listas WHERE id != $id 
                                      AND (
                                          presidente = (SELECT presidente FROM tbl_listas WHERE id = $id)
                                          OR sec_administracion = (SELECT sec_administracion FROM tbl_listas WHERE id = $id)
                                          OR sec_documentacion = (SELECT sec_documentacion FROM tbl_listas WHERE id = $id)
                                          OR tesorero = (SELECT tesorero FROM tbl_listas WHERE id = $id)
                                          OR vocal_programacion = (SELECT vocal_programacion FROM tbl_listas WHERE id = $id)
                                          OR vocal_construccion = (SELECT vocal_construccion FROM tbl_listas WHERE id = $id)
                                          OR vocal_turismo = (SELECT vocal_turismo FROM tbl_listas WHERE id = $id)
                                          OR vocal_cicloBasico1 = (SELECT vocal_cicloBasico1 FROM tbl_listas WHERE id = $id)
                                          OR vocal_cicloBasico2 = (SELECT vocal_cicloBasico2 FROM tbl_listas WHERE id = $id)
                                          OR olimp_representante = (SELECT olimp_representante FROM tbl_listas WHERE id = $id)
                                          OR olimp_vocal1 = (SELECT olimp_vocal1 FROM tbl_listas WHERE id = $id)
                                          OR olimp_vocal2 = (SELECT olimp_vocal2 FROM tbl_listas WHERE id = $id)
                                          OR eventos_representante = (SELECT eventos_representante FROM tbl_listas WHERE id = $id)
                                          OR eventos_vocal1 = (SELECT eventos_vocal1 FROM tbl_listas WHERE id = $id)
                                          OR eventos_vocal2 = (SELECT eventos_vocal2 FROM tbl_listas WHERE id = $id)
                                          OR prensa_representante = (SELECT prensa_representante FROM tbl_listas WHERE id = $id)
                                          OR prensa_vocal1 = (SELECT prensa_vocal1 FROM tbl_listas WHERE id = $id)
                                          OR prensa_vocal2 = (SELECT prensa_vocal2 FROM tbl_listas WHERE id = $id)
                                          OR gyd_representante = (SELECT gyd_representante FROM tbl_listas WHERE id = $id)
                                          OR gyd_vocal1 = (SELECT gyd_vocal1 FROM tbl_listas WHERE id = $id)
                                          OR gyd_vocal2 = (SELECT gyd_vocal2 FROM tbl_listas WHERE id = $id)
                                          OR prof_acesor = (SELECT prof_acesor FROM tbl_listas WHERE id = $id)
                                          OR prof_acesorsup = (SELECT prof_acesorsup FROM tbl_listas WHERE id = $id)
                                      )");

$errorDNIs = array();
while ($row = mysqli_fetch_assoc($dniCheckQuery)) {
    foreach ($row as $column => $value) {
        if ($value != "" && $value != null && $value != "0" && $value != $id) {
            $errorDNIs[] = $value;
        }
    }
}

if (!empty($errorDNIs)) {
    $errorMessage = 'Error: Existen DNI duplicados en la lista. DNIs duplicados: ' . implode(', ', $errorDNIs);
    echo $errorMessage;
} else {
    // Consulta para habilitar/deshabilitar la lista
    $query = mysqli_query($conn,"SELECT * FROM tbl_listas WHERE id = $id");
    $row = mysqli_fetch_array($query);
    $state = $row['habilitada'];

    if ($state == 0) {
        mysqli_query($conn, "UPDATE tbl_listas SET habilitada = 1 WHERE id = $id");
        echo 'Lista habilitada';
    } else if ($state == 1) {
        mysqli_query($conn, "UPDATE tbl_listas SET habilitada = 0 WHERE id = $id");
        echo 'Lista deshabilitada';
    }
}
?>
