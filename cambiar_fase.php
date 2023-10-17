<?php
include("connection.php");
$fase= mysqli_real_escape_string($conn, $_POST['fase']);

$sql = "UPDATE tbl_fases SET fase_fases =" . $fase;
$result = mysqli_query($conn,$sql);

$conn->close();
?>