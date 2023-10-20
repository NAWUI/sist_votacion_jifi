<?php
include("connection.php");

$searchTerm = $_GET['term']; // Search term from Select2 input

$query = "SELECT dni, nombre, apellido FROM personal WHERE dni LIKE '%$searchTerm%' OR nombre LIKE '%$searchTerm%' OR apellido LIKE '%$searchTerm%'";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
