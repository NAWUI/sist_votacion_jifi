<?php
@include 'connection.php';

if (isset($_POST['color'])) {
    $nom_lista = $_POST['color'];
    // $cue = $_POST['cue'];
    
    // Realiza una consulta SQL para obtener los datos basados en el ID
    //$query = "SELECT * FROM tbl_listas WHERE color = '$nom_lista' AND cue_escuela = '$cue'";  Reemplaza 'tu_tabla' con el nombre de tu tabla
    $query = "SELECT * FROM tbl_listas WHERE color = '$nom_lista'";
    $result = mysqli_query($conn, $query);

    

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $presidente = $row['presidente'];
        $sec_administracion = $row['sec_administracion'];
        $sec_documentacion = $row['sec_documentacion'];
        $tesorero = $row['tesorero'];
        $vocal_programacion = $row['vocal_programacion'];
        $vocal_construccion = $row['vocal_construccion'];
        $vocal_turismo = $row['vocal_turismo'];
        $vocal_cicloBasico1 = $row['vocal_cicloBasico1'];
        $vocal_cicloBasico2 = $row['vocal_cicloBasico2'];
        $olimp_representante = $row['olimp_representante'];
        $olimp_vocal1 = $row['olimp_vocal1'];
        $olimp_vocal2 = $row['olimp_vocal2'];
        $eventos_representante = $row['eventos_representante'];
        $eventos_vocal1 = $row['eventos_vocal1'];
        $eventos_vocal2 = $row['eventos_vocal2'];
        $prensa_representante = $row['prensa_representante'];
        $prensa_vocal1 = $row['prensa_vocal1'];
        $prensa_vocal2 = $row['prensa_vocal2'];
        $gyd_representante = $row['gyd_representante'];
        $gyd_vocal1 = $row['gyd_vocal1'];
        $gyd_vocal2 = $row['gyd_vocal2'];
        $prof_acesor = $row['prof_acesor'];
        $prof_acesorsup = $row['prof_acesorsup'];

        $query_integrantes = "SELECT `nombre`,`apellido` FROM `tbl_alumnos` WHERE dni = ";
        $result_integrantes = mysqli_query($conn, $query_integrantes);
        // Aquí puedes formatear y mostrar los datos como desees en el modal
        ?>
        <!-- Encabezado del modal -->
        <div class="modal-header">
                    <h4 class="modal-title">Lista <?php echo $row['color'] ?>:</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Contenido del modal -->
                <div class="modal-body">
                    <h3>Propuesta:</h3>
                    <p><?php echo $row['propuesta1'] ?></p>
                    <p><?php echo $row['propuesta2'] ?></p>
                    <p><?php echo $row['propuesta3'] ?></p>
                    <br>
                    <h3>Integrantes:</h3>
                        <?php 
                            $presidente_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $presidente LIMIT 1;");
                            $presidente_data = mysqli_fetch_assoc($presidente_q);
                            ?>
                            <h5>Presidente:</h5>
                            <p><?php echo $presidente_data['nombre']." ".$presidente_data['apellido']; ?></p>
                            <?php

                            
                            $sec_admin_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $sec_administracion LIMIT 1;");
                            $sec_admin_data = mysqli_fetch_assoc($sec_admin_q);
                            ?>
                            <h5>Secretario de administracion:</h5>
                            <p><?php echo $sec_admin_data['nombre']." ".$sec_admin_data['apellido']; ?></p>
                            <?php
                            
                            $sec_doc_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $sec_documentacion LIMIT 1;");
                            $sec_doc_data = mysqli_fetch_assoc($sec_doc_q);
                            ?>
                            <h5>Secretario de documentacion:</h5>
                            <p><?php echo $sec_doc_data['nombre']." ".$sec_doc_data['apellido']; ?></p>
                            <?php
                            
                            $tesorero_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $tesorero LIMIT 1;");
                            $tesorero_data = mysqli_fetch_assoc($tesorero_q);
                            ?>
                            <h5>Tesorero:</h5>
                            <p><?php echo $tesorero_data['nombre']." ".$tesorero_data['apellido']; ?></p>
                            <?php
                            
                            $vocal_prog_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $vocal_programacion LIMIT 1;");
                            $vocal_prog_data = mysqli_fetch_assoc($vocal_prog_q);
                            ?>
                            <h5>Vocal de programacion:</h5>
                            <p><?php echo $vocal_prog_data['nombre']." ".$vocal_prog_data['apellido']; ?></p>
                            <?php
                            
                            $vocal_const_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $vocal_construccion LIMIT 1;");
                            $vocal_const_data = mysqli_fetch_assoc($vocal_const_q);
                            ?>
                            <h5>Vocal de construccion:</h5>
                            <p><?php echo $vocal_const_data['nombre']." ".$vocal_const_data['apellido']; ?></p>
                            <?php
                            
                            $vocal_tur_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $vocal_turismo LIMIT 1;");
                            $vocal_tur_data = mysqli_fetch_assoc($vocal_tur_q);
                            ?>
                            <h5>Vocal de turismo:</h5>
                            <p><?php echo $vocal_tur_data['nombre']." ".$vocal_tur_data['apellido']; ?></p>
                            <?php
                            
                            $vocal_cb1_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $vocal_cicloBasico1 LIMIT 1;");
                            $vocal_cb1_data = mysqli_fetch_assoc($vocal_cb1_q);
                            
                            $vocal_cb2_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $vocal_cicloBasico2 LIMIT 1;");
                            $vocal_cb2_data = mysqli_fetch_assoc($vocal_cb2_q);
                            ?>
                            <h5>Vocales de ciclo basico:</h5>
                            <p><?php echo "Primero: ".$vocal_cb1_data['nombre']." ".$vocal_cb1_data['apellido']."  Segundo: ".$vocal_cb2_data['nombre']." ".$vocal_cb2_data['apellido']; ?></p>
                            <?php
                            
                            $olimp_rep_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $olimp_representante LIMIT 1;");
                            $olimp_rep_data = mysqli_fetch_assoc($olimp_rep_q);
                            ?>
                            <h5>Representante de olimpiadas:</h5>
                            <p><?php echo $olimp_rep_data['nombre']." ".$olimp_rep_data['apellido']; ?></p>
                            <?php
                            
                            $olimp_v1_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $olimp_vocal1 LIMIT 1;");
                            $olimp_v1_data = mysqli_fetch_assoc($olimp_v1_q);
                            
                            $olimp_v2_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $olimp_vocal2 LIMIT 1;");
                            $olimp_v2_data = mysqli_fetch_assoc($olimp_v2_q);
                            ?>
                            <h5>Vocales de olimpiadas:</h5>
                            <p><?php echo "Primero: ".$olimp_v1_data['nombre']." ".$olimp_v1_data['apellido']."  Segundo: ".$olimp_v2_data['nombre']." ".$olimp_v2_data['apellido']; ?></p>
                            <?php
                            /*
                            $eventos_rep_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            INNER JOIN `tbl_listas` ON tbl_usuarios.cue_escuela = tbl_listas.cue_escuela
                            WHERE dni = $eventos_representante LIMIT 1;");
                            $eventos_rep_data = mysqli_fetch_assoc($eventos_rep_q);
                            ?>
                            <h5>Representante de eventos:</h5>
                            <p><?php echo $eventos_rep_data['nombre']." ".$eventos_rep_data['apellido']; ?></p>
                            <?php
                            
                            $eventos_v1_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            INNER JOIN `tbl_listas` ON tbl_usuarios.cue_escuela = tbl_listas.cue_escuela
                            WHERE dni = $eventos_vocal1 LIMIT 1;");
                            $eventos_v1_data = mysqli_fetch_assoc($eventos_v1_q);
                            
                            $eventos_v2_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            INNER JOIN `tbl_listas` ON tbl_usuarios.cue_escuela = tbl_listas.cue_escuela
                            WHERE dni = $eventos_vocal2 LIMIT 1;");
                            $eventos_v2_data = mysqli_fetch_assoc($eventos_v2_q);
                            ?>
                            <h5>Vocales de eventos:</h5>
                            <p><?php echo "Primero: ".$eventos_v1_data['nombre']." ".$eventos_v1_data['apellido']."  Segundo: ".$eventos_v2_data['nombre']." ".$eventos_v2_data['apellido']; ?></p>
                            <?php
                            */
                            $prensa_rep_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $prensa_representante LIMIT 1;");
                            $prensa_rep_data = mysqli_fetch_assoc($prensa_rep_q);
                            ?>
                            <h5>Representante de prensa:</h5>
                            <p><?php echo $prensa_rep_data['nombre']." ".$prensa_rep_data['apellido']; ?></p>
                            <?php
                            
                            $prensa_v1_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $prensa_vocal1 LIMIT 1;");
                            $prensa_v1_data = mysqli_fetch_assoc($prensa_v1_q);
                            
                            $prensa_v2_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $prensa_vocal2 LIMIT 1;");
                            $prensa_v2_data = mysqli_fetch_assoc($prensa_v2_q);
                            ?>
                            <h5>Vocales de prensa:</h5>
                            <p><?php echo "Primero: ".$prensa_v1_data['nombre']." ".$prensa_v1_data['apellido']."  Segundo: ".$prensa_v2_data['nombre']." ".$prensa_v2_data['apellido']; ?></p>
                            <?php
                            
                            $gyd_rep_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $gyd_representante LIMIT 1;");
                            $gyd_rep_data = mysqli_fetch_assoc($gyd_rep_q);
                            ?>
                            <h5>Representante de genero y derechos:</h5>
                            <p><?php echo $gyd_rep_data['nombre']." ".$gyd_rep_data['apellido']; ?></p>
                            <?php
                            
                            $gyd_v1_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $gyd_vocal1 LIMIT 1;");
                            $gyd_v1_data = mysqli_fetch_assoc($gyd_v1_q);
                            
                            $gyd_v2_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $gyd_vocal2 LIMIT 1;");
                            $gyd_v2_data = mysqli_fetch_assoc($gyd_v2_q);
                            ?>
                            <h5>Vocales de genero y derechos:</h5>
                            <p><?php echo "Primero: ".$gyd_v1_data['nombre']." ".$gyd_v1_data['apellido']."  Segundo: ".$gyd_v2_data['nombre']." ".$gyd_v2_data['apellido']; ?></p>
                            <?php
                            
                            $prof_acesor_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $prof_acesor LIMIT 1;");
                            $prof_acesor_data = mysqli_fetch_assoc($prof_acesor_q);
                            ?>
                            <h5>Profesor acesor:</h5>
                            <p><?php echo $prof_acesor_data['nombre']." ".$prof_acesor_data['apellido']; ?></p>
                            <?php
                            
                            $prof_acesorsup_q = mysqli_query($conn, "SELECT `nombre`, `apellido` FROM `tbl_alumnos`
                            WHERE dni = $prof_acesorsup LIMIT 1;");
                            $prof_acesorsup_data = mysqli_fetch_assoc($prof_acesorsup_q);
                            
                        ?>
                <!-- Botones del modal -->
                    <div class="modal-footer">
                    </div>
                </div>
        <?php
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
} else {
    echo "error";
}
?>
