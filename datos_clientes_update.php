
<?php
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Obtener los datos del formulario
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
// Actualizar la datos en la base de datos
 
$sql = "UPDATE datos_clientes SET 
    nit_deudor = :nit_deudor, 
    id_obligacion = :id_obligacion, 
    nombres = :nombres, 
    sexo = :sexo, 
    cliente_avalista = :cliente_avalista, 
    numero_deuda = :numero_deuda, 
    nombre_producto = :nombre_producto, 
    multiproducto = :multiproducto, 
    dias_mora = :dias_mora, 
    saldo_capital = :saldo_capital, 
    honorarios = :honorarios, 
    saldo_total_honorarios = :saldo_total_honorarios, 
    id_codigo_gestion = :id_codigo_gestion, 
    codigo_gestion = :codigo_gestion, 
    fecha_ultima_gestion = :fecha_ultima_gestion, 
    alternativa = :alternativa, 
    fecha_activacion_cobro = :fecha_activacion_cobro, 
    fecha_ult_cod_gestion_positivo = :fecha_ult_cod_gestion_positivo, 
    cedula_avalista = :cedula_avalista, 
    nombre_avalista = :nombre_avalista, 
    extra1 = :extra1, 
    extra2 = :extra2, 
    extra3 = :extra3, 
    extra4 = :extra4, 
    extra5 = :extra5, 
    id_campaña = :id_campaña, 
    nombre_campaña = :nombre_campaña 
    WHERE id_obligacion = :id_obligacion";

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
    ':nombre_campaña' => $nombre_campaña
]);

// Redirigir después de la actualización exitosa
header("Location: ../publico/index_datos_clientes.php");
exit();
} catch (PDOException $e) {
echo "Error al actualizar la factura: " . $e->getMessage();
exit();
}
}
?>
