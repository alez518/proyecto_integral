<?php
require '../config/db.php'; // Ensure the correct path for the database connection

// Check if the 'id_obligacion' parameter is passed in the URL
if (isset($_GET['id_obligacion'])) {
    $id_obligacion = $_GET['id_obligacion'];
    try {
        // Prepare the SQL query to delete the record
        $sql = "DELETE FROM datos_clientes WHERE id_obligacion = :id_obligacion";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_obligacion', $id_obligacion, PDO::PARAM_INT);
        
        // Execute the query and display success or error messages
        if ($stmt->execute()) {
            $message = "Registro eliminado con éxito.";
            $alertType = "success";
        } else {
            $message = "Error al eliminar el registro.";
            $alertType = "danger";
        }
    } catch (PDOException $e) {
        $message = "Error: " . htmlspecialchars($e->getMessage());
        $alertType = "danger";
    }
} else {
    $message = "ID de la obligación no proporcionado.";
    $alertType = "warning";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-<?php echo $alertType; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="../publico/index_datos_clientes.php" class="btn btn-primary">Volver a la lista de registros</a>
    </div>
</body>
</html>