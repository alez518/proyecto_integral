<?php
require '../config/db.php';

// Validar que los datos del formulario estén presentes
if (!isset($_POST['id_campaña']) || !isset($_POST['nombre_campaña']) || !isset($_POST['tipo_campaña']) || !isset($_POST['etapa_campaña'])) {
die('Datos del formulario incompletos.');
}

$id_campaña = $_POST['id_campaña'];
$nombre_campaña = $_POST['nombre_campaña'];
$tipo_campaña = $_POST['tipo_campaña'];
$etapa_campaña = $_POST['etapa_campaña'];

$sql = "UPDATE campañas SET nombre_campaña = ?, tipo_campaña = ?, etapa_campaña = ? WHERE Id_campaña = ?";
$stmt = $pdo->prepare($sql);

try {
$stmt->execute([$nombre_campaña, $tipo_campaña, $etapa_campaña, $id_campaña]);
header("Location: ../publico/index.php");
exit();
} catch (PDOException $e) {
echo 'Error: ' . $e->getMessage();
}
?>