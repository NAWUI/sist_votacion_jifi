<?php
include("connection.php");

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $query = mysqli_query($conn,"SELECT * FROM `tbl_listas` WHERE `id` = $id");
    $row = mysqli_fetch_array($query);
    $state = $row['habilitada'];

    if ($state == 0) {
        mysqli_query($conn, "UPDATE `tbl_listas` SET `habilitada` = 1 WHERE `id` = $id");
        echo 'Lista habilitada';
    } else if ($state == 1) {
        mysqli_query($conn, "UPDATE `tbl_listas` SET `habilitada` = 0 WHERE `id` = $id");
        echo 'Lista deshabilitada';
    };  
?>