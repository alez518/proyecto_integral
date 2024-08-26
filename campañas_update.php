<?php
require '../config/db.php';



if (!isset($_GET['id_campaña']) || empty($_GET['id_campaña'])) {
die('id_campaña de la campaña no proporcionado');
}

$id_campaña = $_GET['id_campaña'];


$sql = "SELECT * FROM campañas WHERE id_campaña = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_campaña]);
$campañas = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$campañas) {
die('Campañas no encontrada');
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Campañas</title>
    <br>
<br>
<style>
body {
    
    background-image: url("../imagenes/fondo_login2.jpg");
    background-size: cover; /* Ajusta la imagen para cubrir toda la pantalla */
    background-position: center; /* Centra la imagen */
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0; 
}

.container {
    max-width: 400px;
    margin-top: 50px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.5); /* Fondo blanco con 50% de opacidad */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8); /* Sombra con 50% de opacidad */
    border-radius: 30px;
}
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Campaña</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<img src="../imagenes/logo_login.PNG" alt="Logo" style="height: 80px;" class="d-block mx-auto">
    <h1 class="text-center mb-4">Editar Campañas</h1>
        <form action="../sesiones/campañas_update.php" method="post">
            <input type="hidden" name="id_campaña" value="<?= htmlspecialchars($campañas['id_campaña']) ?>">
            
            
            <div class="form-group">
                <label for="id_campaña">ID de la campaña:</label>
                <input type="text" class="form-control" id="id_campaña" name="id_campaña" value="<?= htmlspecialchars($campañas['id_campaña']) ?>" required>
            </div>

            <div class="form-group">
                <label for="nombre_campaña">Nombre de la campaña:</label>
                <input type="text" class="form-control" id="nombre_campaña" name="nombre_campaña" value="<?= htmlspecialchars($campañas['nombre_campaña']) ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo_campaña">Tipo de campaña:</label>
                <input type="text" class="form-control" id="tipo_campaña" name="tipo_campaña" value="<?= htmlspecialchars($campañas['tipo_campaña']) ?>" required>
            </div>

            <div class="form-group">
                <label for="etapa_campaña">Etapa de la campaña:</label>
                <input type="text" class="form-control" id="etapa_campaña" name="etapa_campaña" value="<?= htmlspecialchars($campañas['etapa_campaña']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            <br>
            <a href="../publico/index.php">Ver Campañas</a>
        </form>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
