<?php
require '../config/db.php';

// Primera consulta para obtener todas las facturas
$sql = "SELECT * FROM arbol_gestion";

$stmt = $pdo->query($sql);
$arbol_gestion = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Códigos de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1 class="mb-4">Lista de Códigos de Gestión</h1>

    <a href="../vistas/crear_arbol_gestion.php" class="btn btn-primary mb-4">Crear Nuevo Código</a>
    <div class="text-center">
<a href="../index.php" class="btn btn-danger">Volver al Inicio</a>
<br>
<br>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Código Gestión</th>
                <th>Código Gestión</th>
                <th>Prioridad</th>
                <th>Agrupador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($arbol_gestion as $arbol_gestion) : 
            $id_codigo_gestion = htmlspecialchars($arbol_gestion['id_codigo_gestion']); 
            $codigo_gestion = htmlspecialchars($arbol_gestion['codigo_gestion']);
            $prioridad = htmlspecialchars($arbol_gestion['prioridad']);
            $agrupador = htmlspecialchars($arbol_gestion['agrupador']);
        ?>
            <tr>
                <td><?= $id_codigo_gestion ?></td>
                <td><?= $codigo_gestion ?></td>
                <td><?= $prioridad ?></td>
                <td><?= $agrupador ?></td>
                <td>
                        <a href="../vistas/arbol_gestion_update.php?id_codigo_gestion=<?= htmlspecialchars($arbol_gestion['id_codigo_gestion']) ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="../sesiones/arbol_gestion_eliminar.php?id_codigo_gestion=<?= htmlspecialchars($arbol_gestion['id_codigo_gestion']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
