<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Crear Nuevo Cliente</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-image: url("../imagenes/fondo_login2.jpg");
    background-size: cover;
    background-position: center;
    height: 100vh;
    margin: 0;
}
.container {
    max-width: 1200px;
    margin-top: 50px;
    padding: 20px;
    backdrop-filter: blur(8px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    border-radius: 30px;
}
</style>
</head>
<body>
<div class="container mt-5">
    <img src="../imagenes/logo_login.PNG" alt="Logo" style="height: 80px;" class="d-block mx-auto">
    <h1 class="text-center mb-5">Crear Clientes</h1>
   
    <form action="../sesiones/crear_datos_clientes.php" method="post">
        <div class="row">
            <!-- Campos de formulario -->
            <div class="col-md-2 form-group">
                <label for="nit_deudor">NIT Deudor:</label>
                <input type="text" class="form-control" id="nit_deudor" name="nit_deudor" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="id_obligacion">ID obligación:</label>
                <input type="text" class="form-control" id="id_obligacion" name="id_obligacion" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="sexo">Sexo:</label>
                <input type="text" class="form-control" id="sexo" name="sexo" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="cliente_avalista">Cliente Avalista:</label>
                <input type="text" class="form-control" id="cliente_avalista" name="cliente_avalista" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="numero_deuda">Número Deuda:</label>
                <input type="text" class="form-control" id="numero_deuda" name="numero_deuda" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="nombre_producto">Nombre Producto:</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="multiproducto">Multiproducto:</label>
                <input type="text" class="form-control" id="multiproducto" name="multiproducto" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="dias_mora">Días Mora:</label>
                <input type="text" class="form-control" id="dias_mora" name="dias_mora" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="saldo_capital">Saldo Capital:</label>
                <input type="text" class="form-control" id="saldo_capital" name="saldo_capital" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="honorarios">Honorarios:</label>
                <input type="text" class="form-control" id="honorarios" name="honorarios" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="saldo_total_honorarios">Saldo Total Honorarios:</label>
                <input type="text" class="form-control" id="saldo_total_honorarios" name="saldo_total_honorarios" required>
            </div>
            <!-- Campo id_codigo_gestion visible -->
            <div class="col-md-2 form-group">
                <label for="id_codigo_gestion">ID Código Gestión:</label>
                <input type="text" class="form-control" id="id_codigo_gestion" name="id_codigo_gestion" readonly>
            </div>
            <div class="col-md-2 form-group">
                <label for="codigo_gestion">Código Gestión:</label>
                <select class="form-control" id="codigo_gestion" name="codigo_gestion" required onchange="actualizarIdCodigoGestion()">
                    <option value="">Seleccione un código</option>
                    <?php
                    require '../config/db.php';
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
            
            <div class="col-md-2 form-group">
                <label for="fecha_ultima_gestion">Fecha Última Gestión:</label>
                <input type="date" class="form-control" id="fecha_ultima_gestion" name="fecha_ultima_gestion" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="alternativa">Alternativa:</label>
                <input type="text" class="form-control" id="alternativa" name="alternativa" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="fecha_activacion_cobro">Fecha Activación:</label>
                <input type="date" class="form-control" id="fecha_activacion_cobro" name="fecha_activacion_cobro" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="fecha_ult_cod_gestion_positivo">Fecha Gestión Positivo:</label>
                <input type="date" class="form-control" id="fecha_ult_cod_gestion_positivo" name="fecha_ult_cod_gestion_positivo" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="cedula_avalista">Cédula Avalista:</label>
                <input type="text" class="form-control" id="cedula_avalista" name="cedula_avalista" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="nombre_avalista">Nombre Avalista:</label>
                <input type="text" class="form-control" id="nombre_avalista" name="nombre_avalista" required>
            </div>
            <div class="col-md-2 form-group">
                <label for="extra1">Extra1:</label>
                <input type="text" class="form-control" id="extra1" name="extra1">
            </div>
            <div class="col-md-2 form-group">
                <label for="extra2">Extra2:</label>
                <input type="text" class="form-control" id="extra2" name="extra2">
            </div>
            <div class="col-md-2 form-group">
                <label for="extra3">Extra3:</label>
                <input type="text" class="form-control" id="extra3" name="extra3">
            </div>
            <div class="col-md-2 form-group">
                <label for="extra4">Extra4:</label>
                <input type="text" class="form-control" id="extra4" name="extra4">
            </div>
            <div class="col-md-2 form-group">
                <label for="extra5">Extra5:</label>
                <input type="text" class="form-control" id="extra5" name="extra5">
            </div>
            <div class="col-md-2 form-group">
                <label for="id_campaña">ID Campaña:</label>
                <input type="text" class="form-control" id="id_campaña" name="id_campaña" readonly>
            </div>
            <!-- Campo id_campaña visible -->
            <div class="col-md-2 form-group">
                <label for="nombre_campaña">Nombre Campaña:</label>
                <select class="form-control" id="nombre_campaña" name="nombre_campaña" required onchange="actualizarIdcampaña()">
                    <option value="">Seleccione un código</option>
                    <?php
                    require '../config/db.php';
                    try {
                        $stmt = $pdo->query("SELECT id_campaña, nombre_campaña FROM campañas");
                        $campañas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($campañas as $campaña) {
                            echo "<option value='" . htmlspecialchars($campaña['nombre_campaña']) . "' data-id='" . htmlspecialchars($campaña['id_campaña']) . "'>" . htmlspecialchars($campaña['nombre_campaña']) . "</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Error al obtener los datos de gestión: " . htmlspecialchars($e->getMessage());
                    }
                    ?>
                </select>
            </div>
            
        </div>

        <script>
        function actualizarIdCodigoGestion() {
            var selectCodigoGestion = document.getElementById("codigo_gestion");
            var idCodigoGestion = selectCodigoGestion.options[selectCodigoGestion.selectedIndex].getAttribute("data-id");
            document.getElementById("id_codigo_gestion").value = idCodigoGestion;
        }
        function actualizarIdcampaña() {
            var selectCampaña = document.getElementById("nombre_campaña");
            var idCampaña = selectCampaña.options[selectCampaña.selectedIndex].getAttribute("data-id");
            document.getElementById("id_campaña").value = idCampaña;
        }
        </script>
        <button type="submit" class="btn btn-primary btn-block">Crear Cliente</button>
    </form>
    <p class="text-center mt-3">
<a href="../publico/index_datos_clientes.php">Ver Clientes</a>

<br>
<br>
<a href="../index.php" class="btn btn-danger">Volver al Inicio</a>
        </div>
</body>
</html>
