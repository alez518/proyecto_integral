<?php
require '../config/db.php';



if (!isset($_GET['id_codigo_gestion']) || empty($_GET['id_codigo_gestion'])) {
die('id_codigo_gestion de la campaña no proporcionado');
}

$id_codigo_gestion = $_GET['id_codigo_gestion'];


$sql = "SELECT * FROM arbol_gestion WHERE id_codigo_gestion = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_codigo_gestion]);
$arbol_gestion = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$arbol_gestion) {
die('codigo gestion no encontrada');
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Codigos de Gestion</title>
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
            backdrop-filter: blur(8px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8); /* Sombra con 50% de opacidad */
            border-radius: 30px;
            text-align: center; /* Centrar el contenido */
        }

        .form-label {
            text-align: left; /* Para alinear las etiquetas a la izquierda */
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar codigos de gestion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<img src="../imagenes/logo_login.PNG" alt="Logo" style="height: 80px;" class="d-block mx-auto">
    <h1 class="text-center mb-4">Editar codigos de gestion</h1>
        <form action="../sesiones/arbol_gestion_update.php" method="post">
            <input type="hidden" name="id_codigo_gestion" value="<?= htmlspecialchars($arbol_gestion['id_codigo_gestion']) ?>">
            
            
            <div class="form-group">
                <label for="id_codigo_gestion">ID Codigo de Gestion:</label>
                <input type="text" class="form-control" id="id_codigo_gestion" name="id_codigo_gestion" value="<?= htmlspecialchars($arbol_gestion['id_codigo_gestion']) ?>" required>
            </div>

            <div class="form-group">
                <label for="codigo_gestion">Nombre del codigo:</label>
                <input type="text" class="form-control" id="codigo_gestion" name="codigo_gestion" value="<?= htmlspecialchars($arbol_gestion['codigo_gestion']) ?>" required>
            </div>

            <div class="form-group">
                <label for="prioridad">prioridad:</label>
                <input type="text" class="form-control" id="prioridad" name="prioridad" value="<?= htmlspecialchars($arbol_gestion['prioridad']) ?>" required>
            </div>

            <div class="form-group">
                <label for="agrupador">agrupador:</label>
                <input type="text" class="form-control" id="agrupador" name="agrupador" value="<?= htmlspecialchars($arbol_gestion['agrupador']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            <br>
            <a href="../publico/index_arbol_gestion.php">Ver Codigos</a>
        </form>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>