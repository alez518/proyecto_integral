<?php
require '../config/db.php';
// Recoge los datos del formulario

$id_codigo_gestion = $_POST['id_codigo_gestion']; // Usando 'id' en minúscula en el formulario
$codigo_gestion = $_POST['codigo_gestion'];
$prioridad = $_POST['prioridad'];
$agrupador = $_POST['agrupador'];
  try {
// Consulta SQL para insertar datos
$sql = "INSERT INTO arbol_gestion (id_codigo_gestion, codigo_gestion, prioridad, agrupador) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_codigo_gestion, $codigo_gestion, $prioridad, $agrupador]);

// Redirige a la página de lista de clientes
header("Location: ../publico/index_arbol_gestion.php");
exit();
} catch (PDOException $e) {
    echo "Error al crear el cliente: " . $e->getMessage();
}
echo "Error: Método de solicitud no permitido.";

?>