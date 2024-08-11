<?php
require '../config/db.php';
$id_campaña = $_GET['id_campaña'];
$sql = "DELETE FROM campañas WHERE id_campaña = ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id_campaña]);
header("Location: ../publico/index.php");
?>