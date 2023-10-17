<?php
include('connection.php');

if (!isset($_POST['id'])) {
    echo 'Error';
};

$id_cde = $_POST['id'];

$query = "DELETE FROM `tbl_listas` WHERE id = '$id_cde'";

if ($sql = mysqli_query($conn, $query)) {
    echo 'Lista eliminada';
} else {
    echo 'Vuelva a intentar';
};

?>