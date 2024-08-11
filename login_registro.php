<?php
include('config/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id_cedula = $_POST['id_cedula'];
$usuario = $_POST['usuario'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
if (!empty($id_cedula) &&!empty($usuario) && !empty($password)) {
// Preparar la consulta SQL
$stmt = $pdo->prepare("INSERT INTO usuarios (id_cedula, usuario, password) VALUES (:id_cedula, :usuario, :password)");
if ($stmt->execute(['id_cedula' => $id_cedula,'usuario' => $usuario, 'password' => $password])) {
header("Location: login_registro.php");

exit();
} else {
$error = "Error al registrar el usuario.";
}
} else {
$error = "Por favor, complete todos los campos.";
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrarse</title>
<link 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
rel="stylesheet">
<br>
<br>
<h1 style="color: lightgray; text-align: center;">¿Quieres Ser Parte de Nuestro Equipo?</h1>
<style>
body {
    background-image: url("imagenes/fondo_registro.jpg");
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
    background: rgba(255, 255, 255, 0.1); /* Fondo blanco con 50% de opacidad */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Sombra con 50% de opacidad */
    border-radius: 30px;
}
</style>
</head>
<body>
<div class="container" style="text-align: center;">
<img src="imagenes\logo_login.PNG" alt="Logo" style="height: 80px;"></a>
<h2 class="text-center">Registrarse</h2>
<?php if (isset($error)): ?>
<div class="alert alert-danger" id="error-alert">
<?php echo $error; ?>
</div>
<?php endif; ?>
<form action="login_registro.php" method="post">
<div class="form-group">
<label for="id_cedula" class="form-label">Cedula</label>
<input type="id_cedula" class="form-control" id="id_cedula" name="id_cedula" required>
</div>
<div class="form-group">
<label for="usuario" class="form-label">usuario</label>
<input type="usuario" class="form-control" id="usuario" name="usuario" required>
</div>
<div class="form-group">
<label for="password" class="form-label">Contraseña</label>
<input type="password" class="form-control" id="password" name="password" required>
</div>
<button type="submit" class="btn btn-primary btn-block">Registrarse</button>
</form>
<p class="text-center mt-3">
<a href="login.php">Iniciar Sesión</a>
</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
$("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
$(this).slideUp(500);
});
});
</script>
</body>
</html>