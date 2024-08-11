<?php
require '../config/db.php';

$sql = "SELECT * FROM campañas";
$stmt = $pdo->query($sql);
$campañas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Campañas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<br>
<div class="container" style="text-align: center;">
<img src="..\imagenes\logo_login.PNG" alt="Logo" style="height: 80px;"></a>
        <h1 class="mb-4"style="text-align: center;">Campañas</h1>

<div class="text-center">
<a href="index.php" class="btn btn-primary mb-3">Menu</a>
<a href="../vistas/crear_campañas.php" class="btn btn-primary mb-3">Crear Campañas</a>
</div>

        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
    <th style="text-align: center;">id_campaña</th>
    <th style="text-align: center;">nombre_campaña</th>
    <th style="text-align: center;">tipo_campaña</th>
    <th style="text-align: center;">etapa_campaña</th>
    <th style="text-align: center;">Acciones</th>
</tr>
            </thead>
            <tbody>
                <?php foreach ($campañas as $campañas): ?>
                <tr>
                    <td><?= htmlspecialchars($campañas['id_campaña']) ?></td>
                    <td><?= htmlspecialchars($campañas['nombre_campaña']) ?></td>
                    <td><?= htmlspecialchars($campañas['tipo_campaña']) ?></td>
                    <td><?= htmlspecialchars($campañas['etapa_campaña']) ?></td>
                    
                    <td>
                        <a href="../vistas/campañas_update.php?id_campaña=<?= htmlspecialchars($campañas['id_campaña']) ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="../sesiones/campañas_eliminar.php?id_campaña=<?= htmlspecialchars($campañas['id_campaña']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
