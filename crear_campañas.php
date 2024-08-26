<?php
require '../config/db.php';
// Recoge los datos del formulario

$id_campaña = $_POST['id_campaña']; // Usando 'id' en minúscula en el formulario
$nombre_campaña = $_POST['nombre_campaña'];
$tipo_campaña = $_POST['tipo_campaña'];
$etapa_campaña = $_POST['etapa_campaña'];

// Consulta SQL para insertar datos
$sql = "INSERT INTO campañas (id_campaña, nombre_campaña, tipo_campaña, etapa_campaña) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_campaña, $nombre_campaña, $tipo_campaña, $etapa_campaña]);

// Redirige a la página de lista de clientes
header("Location: ../publico/index.php");
exit();
?>