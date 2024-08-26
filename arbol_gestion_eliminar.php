<?php
require '../config/db.php';
$id_codigo_gestion = $_GET['id_codigo_gestion'];
$sql = "DELETE FROM arbol_gestion WHERE id_codigo_gestion = ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id_codigo_gestion]);
header("Location: ../publico/index_arbol_gestion.php");
?>