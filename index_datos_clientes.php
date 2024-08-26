<?php
require '../config/db.php';

// Consulta para obtener todos los clientes
$sql = "SELECT 
    d.nit_deudor, 
    dc.id_obligacion, 
    dc.nombres, 
    dc.sexo, 
    dc.cliente_avalista, 
    dc.numero_deuda, 
    dc.nombre_producto, 
    dc.multiproducto, 
    dc.dias_mora, 
    dc.saldo_capital, 
    dc.honorarios, 
    dc.saldo_total_honorarios, 
    ag.id_codigo_gestion, 
    ag.codigo_gestion, 
    dc.fecha_ultima_gestion, 
    dc.alternativa, 
    dc.fecha_activacion_cobro, 
    dc.fecha_ult_cod_gestion_positivo, 
    dc.cedula_avalista, 
    dc.nombre_avalista, 
    dc.extra1, 
    dc.extra2, 
    dc.extra3, 
    dc.extra4, 
    dc.extra5, 
    c.id_campaña, 
    c.nombre_campaña
FROM datos_clientes dc
JOIN arbol_gestion ag ON dc.id_codigo_gestion = ag.id_codigo_gestion
JOIN demograficos d ON dc.nit_deudor = d.nit_deudor
JOIN campañas c ON dc.id_campaña = c.id_campaña";



$stmt = $pdo->query($sql);
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<br>
<div class="container" style="text-align: center;">
<img src="..\imagenes\logo_login.PNG" alt="Logo" style="height: 80px;"></a>
<h1 class="mb-4">Lista de Clientes</h1>
<div class="text-center">
    <div class="container mt-5">
        
        <div class="container mt-5">

            <a href="../index.php" class="btn btn-primary">Volver al Inicio</a>
            <a href="../vistas/crear_datos_clientes.php" class="btn btn-success">Crear Nuevo cliente</a>
        </div>
        <br>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">NIT Deudor</th>
                    <th style="text-align: center;">ID Obligación</th>
                    <th style="text-align: center;">Nombres</th>
                    <th style="text-align: center;">Sexo</th>
                    <th style="text-align: center;">Cliente Avalista</th>
                    <th style="text-align: center;">Número de Deuda</th>
                    <th style="text-align: center;">Nombre Producto</th>
                    <th style="text-align: center;">Multiproducto</th>
                    <th style="text-align: center;">Días Mora</th>
                    <th style="text-align: center;">Saldo Capital</th>
                    <th style="text-align: center;">Honorarios</th>
                    <th style="text-align: center;">Saldo Total Honorarios</th>
                    <th style="text-align: center;">ID Código Gestión</th>
                    <th style="text-align: center;">Código Gestión</th>
                    <th style="text-align: center;">Fecha Última Gestión</th>
                    <th style="text-align: center;">Alternativa</th>
                    <th style="text-align: center;">Fecha Activación Cobro</th>
                    <th style="text-align: center;">Fecha Último Código Gestión Positivo</th>
                    <th style="text-align: center;">Cédula Avalista</th>
                    <th style="text-align: center;">Nombre Avalista</th>
                    <th style="text-align: center;">Extra 1</th>
                    <th style="text-align: center;">Extra 2</th>
                    <th style="text-align: center;">Extra 3</th>
                    <th style="text-align: center;">Extra 4</th>
                    <th style="text-align: center;">Extra 5</th>
                    <th style="text-align: center;">ID Campaña</th>
                    <th style="text-align: center;">Nombre Campaña</th>
                    <th style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $fila): ?>
                    <?php                                      
$nit_deudor = htmlspecialchars($fila['nit_deudor']);
$id_obligacion = htmlspecialchars($fila['id_obligacion']);
$nombres = htmlspecialchars($fila['nombres']);
$sexo = htmlspecialchars($fila['sexo']);
$cliente_avalista = htmlspecialchars($fila['cliente_avalista']);
$numero_deuda = htmlspecialchars($fila['numero_deuda']);
$nombre_producto = htmlspecialchars($fila['nombre_producto']);
$multiproducto = htmlspecialchars($fila['multiproducto']);
$dias_mora = htmlspecialchars($fila['dias_mora']);
$saldo_capital = htmlspecialchars($fila['saldo_capital']);
$honorarios = htmlspecialchars($fila['honorarios']);
$saldo_total_honorarios = htmlspecialchars($fila['saldo_total_honorarios']);
$id_codigo_gestion = htmlspecialchars($fila['id_codigo_gestion']);
$codigo_gestion = htmlspecialchars($fila['codigo_gestion']);
$fecha_ultima_gestion = htmlspecialchars($fila['fecha_ultima_gestion']);
$alternativa = htmlspecialchars($fila['alternativa']);
$fecha_activacion_cobro = htmlspecialchars($fila['fecha_activacion_cobro']);
$fecha_ult_cod_gestion_positivo = htmlspecialchars($fila['fecha_ult_cod_gestion_positivo']);
$cedula_avalista = htmlspecialchars($fila['cedula_avalista']);
$nombre_avalista = htmlspecialchars($fila['nombre_avalista']);
$extra1 = htmlspecialchars($fila['extra1']);
$extra2 = htmlspecialchars($fila['extra2']);
$extra3 = htmlspecialchars($fila['extra3']);
$extra4 = htmlspecialchars($fila['extra4']);
$extra5 = htmlspecialchars($fila['extra5']);
$id_campaña = htmlspecialchars($fila['id_campaña']);
$nombre_campaña = htmlspecialchars($fila['nombre_campaña']);

?>
<tr>

                            <td><?= $nit_deudor ?></td>
                            <td><?= $id_obligacion ?></td>
                            <td><?= $nombres ?></td>
                            <td><?= $sexo ?></td>
                            <td><?= $cliente_avalista ?></td>
                            <td><?= $numero_deuda ?></td>
                            <td><?= $nombre_producto ?></td>
                            <td><?= $multiproducto ?></td>
                            <td><?= $dias_mora ?></td>
                            <td><?= $saldo_capital ?></td>
                            <td><?= $honorarios ?></td>
                            <td><?= $saldo_total_honorarios ?></td>
                            <td><?= $id_codigo_gestion ?></td>
                            <td><?= $codigo_gestion ?></td>
                            <td><?= $fecha_ultima_gestion ?></td>
                            <td><?= $alternativa ?></td>
                            <td><?= $fecha_activacion_cobro ?></td>
                            <td><?= $fecha_ult_cod_gestion_positivo ?></td>
                            <td><?= $cedula_avalista ?></td>
                            <td><?= $nombre_avalista ?></td>
                            <td><?= $extra1 ?></td>
                            <td><?= $extra2 ?></td>
                            <td><?= $extra3 ?></td>
                            <td><?= $extra4 ?></td>
                            <td><?= $extra5 ?></td>
                            <td><?= $id_campaña ?></td>
                            <td><?= $nombre_campaña ?></td>
<td>
<a href='../vistas/datos_clientes_update.php?id_obligacion=<?= htmlspecialchars($fila['id_obligacion']) ?>' class='btn btn-warning btn-sm'>Editar</a>
<a href='../sesiones/datos_clientes_eliminar.php?id_obligacion=<?= htmlspecialchars($fila['id_obligacion']) ?>' class='btn btn-danger btn-sm' onclick="return confirm('¿Estás seguro?')">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
</tbody>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>