<?php
require '../config/db.php';

// Comprobación de acción
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_obligacion'])) {
    $id_obligacion = $_GET['id_obligacion'];
    echo "ID de la factura recibida: " . htmlspecialchars($id_obligacion) . "<br>";

    // Aquí puedes colocar el código que depende de 'id_obligacion', como cargar datos para editar
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar datos recibidos por POST
    // ...
} else {
    echo "ID de factura no proporcionado.";
    exit();
}

// Resto del código...
?>


<?php
// Supongamos que estamos en factura_update.php

if (isset($_GET['id_obligacion'])) {
    $id_obligacion = $_GET['id_obligacion'];
    echo "ID de la factura recibida: " . htmlspecialchars($id_obligacion) . "<br>"; // Para verificar el ID recibido

    // Luego, puedes continuar con la consulta
    // ...
} else {
    echo "ID de factura no proporcionado.";
}

// Si tienes formularios, puedes hacer algo similar para POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Datos recibidos por POST:<br>";
    echo "ID de factura: " . htmlspecialchars($_POST['id_obligacion']) . "<br>";
    // Puedes imprimir más datos según los que estés enviando al formulario
}
?>


<?php
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST); // Muestra los datos recibidos para depuración
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
        // Obtener los valores del formulario
        $nit_deudor = $_POST['nit_deudor'];
        $id_obligacion = $_POST['id_obligacion'];
        $nombres = $_POST['nombres'];
        $sexo = $_POST['sexo'];
        $cliente_avalista = $_POST['cliente_avalista'];
        $numero_deuda = $_POST['numero_deuda'];
        $nombre_producto = $_POST['nombre_producto'];
        $multiproducto = $_POST['multiproducto'];
        $dias_mora = $_POST['dias_mora'];
        $saldo_capital = $_POST['saldo_capital'];
        $honorarios = $_POST['honorarios'];
        $saldo_total_honorarios = $_POST['saldo_total_honorarios'];
        $id_codigo_gestion = $_POST['id_codigo_gestion'];
        $codigo_gestion = $_POST['codigo_gestion'];
        $fecha_ultima_gestion = $_POST['fecha_ultima_gestion'];
        $alternativa = $_POST['alternativa'];
        $fecha_activacion_cobro = $_POST['fecha_activacion_cobro'];
        $fecha_ult_cod_gestion_positivo = $_POST['fecha_ult_cod_gestion_positivo'];
        $cedula_avalista = $_POST['cedula_avalista'];
        $nombre_avalista = $_POST['nombre_avalista'];
        $extra1 = $_POST['extra1'];
        $extra2 = $_POST['extra2'];
        $extra3 = $_POST['extra3'];
        $extra4 = $_POST['extra4'];
        $extra5 = $_POST['extra5'];
        $id_campaña = $_POST['id_campaña'];
        $nombre_campaña = $_POST['nombre_campaña'];
       try {
        // Insertar los datos del cliente en la base de datos
        $sql = "INSERT INTO datos_clientes 
                (nit_deudor, id_obligacion, nombres, sexo, cliente_avalista, numero_deuda, nombre_producto, multiproducto, dias_mora, saldo_capital, honorarios, saldo_total_honorarios, id_codigo_gestion, codigo_gestion, fecha_ultima_gestion, alternativa, fecha_activacion_cobro, fecha_ult_cod_gestion_positivo, cedula_avalista, nombre_avalista, extra1, extra2, extra3, extra4, extra5, id_campaña, nombre_campaña) 
               VALUES 
                (:nit_deudor, :id_obligacion, :nombres, :sexo, :cliente_avalista, :numero_deuda, :nombre_producto, :multiproducto, :dias_mora, :saldo_capital, :honorarios, :saldo_total_honorarios, :id_codigo_gestion, :codigo_gestion, :fecha_ultima_gestion, :alternativa, :fecha_activacion_cobro, :fecha_ult_cod_gestion_positivo, :cedula_avalista, :nombre_avalista, :extra1, :extra2, :extra3, :extra4, :extra5, :id_campaña, :nombre_campaña)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nit_deudor' => $nit_deudor,
            ':id_obligacion' => $id_obligacion,
            ':nombres' => $nombres,
            ':sexo' => $sexo,
            ':cliente_avalista' => $cliente_avalista,
            ':numero_deuda' => $numero_deuda,
            ':nombre_producto' => $nombre_producto,
            ':multiproducto' => $multiproducto,
            ':dias_mora' => $dias_mora,
            ':saldo_capital' => $saldo_capital,
            ':honorarios' => $honorarios,
            ':saldo_total_honorarios' => $saldo_total_honorarios,
            ':id_codigo_gestion' => $id_codigo_gestion,
            ':codigo_gestion' => $codigo_gestion,
            ':fecha_ultima_gestion' => $fecha_ultima_gestion,
            ':alternativa' => $alternativa,
            ':fecha_activacion_cobro' => $fecha_activacion_cobro,
            ':fecha_ult_cod_gestion_positivo' => $fecha_ult_cod_gestion_positivo,
            ':cedula_avalista' => $cedula_avalista,
            ':nombre_avalista' => $nombre_avalista,
            ':extra1' => $extra1,
            ':extra2' => $extra2,
            ':extra3' => $extra3,
            ':extra4' => $extra4,
            ':extra5' => $extra5,
            ':id_campaña' => $id_campaña,
            ':nombre_campaña' => $nombre_campaña,
        ]);

        // Redirigir al usuario a la página de éxito o a la lista de clientes
        header("Location: ../publico/index_datos_clientes.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al crear el cliente: " . $e->getMessage();
    }
} else {
    echo "Error: Método de solicitud no permitido.";
}
?>
