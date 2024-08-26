<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            max-width: 1000px; /* Ajusta el ancho máximo del contenedor */
            margin-top: 50px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.5); /* Fondo blanco con 50% de opacidad */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8); /* Sombra con 50% de opacidad */
            border-radius: 30px;
        }
    </style>
    <script>
        function actualizarIdCodigoGestion() {
            var selectCodigoGestion = document.getElementById("codigo_gestion");
            var idCodigoGestion = selectCodigoGestion.options[selectCodigoGestion.selectedIndex].getAttribute("data-id");
            document.getElementById("id_codigo_gestion").value = idCodigoGestion;

            var selectCampaña = document.getElementById("nombre_campaña");
            var idCampaña = selectCampaña.options[selectCampaña.selectedIndex].getAttribute("data-id");
            document.getElementById("id_campaña").value = idCampaña;
        }
    </script>
</head>
<body>
    <div class="container">
        <img src="../imagenes/logo_login.PNG" alt="Logo" style="height: 80px;" class="d-block mx-auto">
        <h1 class="mb-4 text-center">Editar Clientes</h1>
        <?php
        require '../config/db.php';
        if (isset($_GET['id_obligacion']) && !empty($_GET['id_obligacion'])) {
            $id_obligacion = $_GET['id_obligacion'];
            try {
                $stmt = $pdo->prepare("SELECT * FROM datos_clientes WHERE id_obligacion = :id_obligacion");
                $stmt->execute([':id_obligacion' => $id_obligacion]);
                $datos_clientes = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$datos_clientes) {
                    echo "<div class='alert alert-danger'>No se encontró el cliente con el ID proporcionado.</div>";
                    exit();
                }
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Error al obtener el cliente: " . htmlspecialchars($e->getMessage()) . "</div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'>ID de cliente no proporcionado.</div>";
            exit();
        }
        ?>
        <form action="../sesiones/datos_clientes_update.php" method="post">
            <input type="hidden" name="id_obligacion" value="<?php echo htmlspecialchars($datos_clientes['id_obligacion']); ?>">

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="nit_deudor">NIT Deudor:</label>
                    <input type="text" class="form-control" id="nit_deudor" name="nit_deudor" value="<?= htmlspecialchars($datos_clientes['nit_deudor']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="id_obligacion">ID Obligación:</label>
                    <input type="text" class="form-control" id="id_obligacion" name="id_obligacion" value="<?= htmlspecialchars($datos_clientes['id_obligacion']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?= htmlspecialchars($datos_clientes['nombres']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo:</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" value="<?= htmlspecialchars($datos_clientes['sexo']) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cliente_avalista">Cliente Avalista:</label>
                    <input type="text" class="form-control" id="cliente_avalista" name="cliente_avalista" value="<?= htmlspecialchars($datos_clientes['cliente_avalista']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="numero_deuda">Número de Deuda:</label>
                    <input type="text" class="form-control" id="numero_deuda" name="numero_deuda" value="<?= htmlspecialchars($datos_clientes['numero_deuda']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="nombre_producto">Nombre del Producto:</label>
                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?= htmlspecialchars($datos_clientes['nombre_producto']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="multiproducto">Multiproducto:</label>
                    <input type="text" class="form-control" id="multiproducto" name="multiproducto" value="<?= htmlspecialchars($datos_clientes['multiproducto']) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="dias_mora">Días en Mora:</label>
                    <input type="text" class="form-control" id="dias_mora" name="dias_mora" value="<?= htmlspecialchars($datos_clientes['dias_mora']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="saldo_capital">Saldo de Capital:</label>
                    <input type="text" class="form-control" id="saldo_capital" name="saldo_capital" value="<?= htmlspecialchars($datos_clientes['saldo_capital']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="honorarios">Honorarios:</label>
                    <input type="text" class="form-control" id="honorarios" name="honorarios" value="<?= htmlspecialchars($datos_clientes['honorarios']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="saldo_total_honorarios">Saldo Total de Honorarios:</label>
                    <input type="text" class="form-control" id="saldo_total_honorarios" name="saldo_total_honorarios" value="<?= htmlspecialchars($datos_clientes['saldo_total_honorarios']) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="id_codigo_gestion">ID Código de Gestión:</label>
                    <input type="text" class="form-control" id="id_codigo_gestion" name="id_codigo_gestion" value="<?= htmlspecialchars($datos_clientes['id_codigo_gestion']) ?>" readonly>
                </div>

                <div class="form-group col-md-3">
                    <label for="codigo_gestion">Código Gestión:</label>
                    <select class="form-control" id="codigo_gestion" name="codigo_gestion" required onchange="actualizarIdCodigoGestion()">
                        <option value="">Seleccione un código</option>
                        <?php
                        try {
                            $stmt = $pdo->query("SELECT id_codigo_gestion, codigo_gestion FROM arbol_gestion");
                            $arbol_gestion = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($arbol_gestion as $gestion) {
                                echo "<option value='" . htmlspecialchars($gestion['codigo_gestion']) . "' data-id='" . htmlspecialchars($gestion['id_codigo_gestion']) . "'>" . htmlspecialchars($gestion['codigo_gestion']) . "</option>";
                            }
                        } catch (PDOException $e) {
                            echo "Error al obtener los datos de gestión: " . htmlspecialchars($e->getMessage());
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="fecha_ultima_gestion">Fecha de Última Gestión:</label>
                    <input type="date" class="form-control" id="fecha_ultima_gestion" name="fecha_ultima_gestion" value="<?= htmlspecialchars($datos_clientes['fecha_ultima_gestion']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="alternativa">Alternativa:</label>
                    <input type="text" class="form-control" id="alternativa" name="alternativa" value="<?= htmlspecialchars($datos_clientes['alternativa']) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fecha_activacion_cobro">Fecha de Activación de Cobro:</label>
                    <input type="date" class="form-control" id="fecha_activacion_cobro" name="fecha_activacion_cobro" value="<?= htmlspecialchars($datos_clientes['fecha_activacion_cobro']) ?>" required>
                </div>
                
                <div class="form-group col-md-3">
                    <label for="fecha_ult_cod_gestion_positivo">Fecha Código de Gestión Positivo:</label>
                    <input type="date" class="form-control" id="fecha_ult_cod_gestion_positivo" name="fecha_ult_cod_gestion_positivo" value="<?= htmlspecialchars($datos_clientes['fecha_ult_cod_gestion_positivo']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="cedula_avalista">Cédula del Avalista:</label>
                    <input type="text" class="form-control" id="cedula_avalista" name="cedula_avalista" value="<?= htmlspecialchars($datos_clientes['cedula_avalista']) ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="nombre_avalista">Nombre del Avalista:</label>
                    <input type="text" class="form-control" id="nombre_avalista" name="nombre_avalista" value="<?= htmlspecialchars($datos_clientes['nombre_avalista']) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="extra1">Extra 1:</label>
                    <input type="text" class="form-control" id="extra1" name="extra1" value="<?= htmlspecialchars($datos_clientes['extra1']) ?>" >
                </div>

                <div class="form-group col-md-3">
                    <label for="extra2">Extra 2:</label>
                    <input type="text" class="form-control" id="extra2" name="extra2" value="<?= htmlspecialchars($datos_clientes['extra2']) ?>" >
                </div>

                <div class="form-group col-md-3">
                    <label for="extra3">Extra 3:</label>
                    <input type="text" class="form-control" id="extra3" name="extra3" value="<?= htmlspecialchars($datos_clientes['extra3']) ?>" >
                </div>

                <div class="form-group col-md-3">
                    <label for="extra4">Extra 4:</label>
                    <input type="text" class="form-control" id="extra4" name="extra4" value="<?= htmlspecialchars($datos_clientes['extra4']) ?>" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="extra5">Extra 5:</label>
                    <input type="text" class="form-control" id="extra5" name="extra5" value="<?= htmlspecialchars($datos_clientes['extra5']) ?>" >
                </div>

                <div class="form-group col-md-3">
                    <label for="id_campaña">ID de Campaña:</label>
                    <input type="text" class="form-control" id="id_campaña" name="id_campaña" value="<?= htmlspecialchars($datos_clientes['id_campaña']) ?>" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="nombre_campaña">Nombre de Campaña:</label>
                    <select class="form-control" id="nombre_campaña" name="nombre_campaña" required onchange="actualizarIdCodigoGestion()">
                        <option value="">Seleccione una campaña</option>
                        <?php
                        try {
                            $stmt = $pdo->query("SELECT id_campaña, nombre_campaña FROM campañas");
                            $campañas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($campañas as $campaña) {
                                echo "<option value='" . htmlspecialchars($campaña['nombre_campaña']) . "' data-id='" . htmlspecialchars($campaña['id_campaña']) . "'>" . htmlspecialchars($campaña['nombre_campaña']) . "</option>";
                            }
                        } catch (PDOException $e) {
                            echo "Error al obtener los datos de campañas: " . htmlspecialchars($e->getMessage());
                        }
                        ?>
                    </select>
                    <input type="hidden" id="id_campaña" name="id_campaña" value="">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                <br>
                <br>
                                <a href="../index.php" class="btn btn-primary">Volver al Inicio</a>
                <a href="../publico/index_datos_clientes.php" class="btn btn-success">Ver Clientes</a>
            </div>
        </form>
    </div>
</body>
</html>
