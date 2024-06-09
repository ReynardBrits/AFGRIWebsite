<?php
global $conn;
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM 'products'");

$stmt->execute();

$G_products = $stmt->get_result();
?>
