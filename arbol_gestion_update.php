<?php
require '../config/db.php';

// Validar que los datos del formulario estén presentes
if (!isset($_POST['id_codigo_gestion']) || !isset($_POST['codigo_gestion']) || !isset($_POST['prioridad']) || !isset($_POST['agrupador'])) {
die('Datos del formulario incompletos.');
}

$id_codigo_gestion = $_POST['id_codigo_gestion'];
$codigo_gestion = $_POST['codigo_gestion'];
$prioridad = $_POST['prioridad'];
$agrupador = $_POST['agrupador'];

$sql = "UPDATE arbol_gestion SET codigo_gestion = ?, prioridad = ?, agrupador = ? WHERE id_codigo_gestion = ?";
$stmt = $pdo->prepare($sql);

try {
$stmt->execute([$codigo_gestion, $prioridad, $agrupador, $id_codigo_gestion]);
header("Location: ../publico/index_arbol_gestion.php");
exit();
} catch (PDOException $e) {
echo 'Error: ' . $e->getMessage();
}
?>