<?php
include('connection.php');

if (!isset($_POST['id'])) {
    echo 'Error';
};

$id_cde = $_POST['id'];


?>