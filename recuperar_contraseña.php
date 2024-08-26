<?php
include('config/db.php');
$error = '';
$success = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos estén disponibles
    if (isset($_POST['id_cedula'], $_POST['usuario'], $_POST['password'])) {
        $id_cedula = $_POST['id_cedula'];
        $usuario = $_POST['usuario'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if (!empty($id_cedula) && !empty($usuario) && !empty($password)) {
            // Verificar si el usuario existe
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_cedula = :id_cedula AND usuario = :usuario");
            $stmt->execute(['id_cedula' => $id_cedula, 'usuario' => $usuario]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Actualizar la contraseña
                $stmt = $pdo->prepare("UPDATE usuarios SET password = :password WHERE id_cedula = :id_cedula AND usuario = :usuario");
                if ($stmt->execute(['password' => $password, 'id_cedula' => $id_cedula, 'usuario' => $usuario])) {
                    $success = "Contraseña actualizada correctamente.";
                } else {
                    $error = "Error al actualizar la contraseña.";
                }
            } else {
                $error = "El usuario no existe.";
            }
        } else {
            $error = "Por favor, complete todos los campos.";
        }
    } else {
        $error = "Datos incompletos.";
    }
}
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <br>
<br>
<br>
    <style>
   body {
    background-image: url("imagenes/fondo_login2.jpg");
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
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.0); /* Fondo blanco con 50% de opacidad */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Sombra con 50% de opacidad */
    border-radius: 30px;
}
</style>
</head>
<body>
<div class="container" style="text-align: center;">
<img src="imagenes\logo_login.PNG" alt="Logo" style="height: 80px;"></a>
<h2 class="text-center">Recuperar Contraseña</h2>
<?php if (!empty($error)): ?>
<div class="alert alert-danger" id="error-alert">
<?php echo $error; ?>
</div>
<?php endif; ?>
<?php if (!empty($success)): ?>
<div class="alert alert-success" id="success-alert">
<?php echo $success; ?>
</div>
<?php endif; ?>
<form action="recuperar_contraseña.php" method="post">
<div class="form-group">
<label for="id_cedula" class="form-label">Cedula</label>
<input type="id_cedula" class="form-control" id="id_cedula" name="id_cedula" required>
</div>
<div class="form-group">
<label for="usuario" class="form-label">Usuario</label>
<input type="usuario" class="form-control" id="usuario" name="usuario" required>
</div>
<div class="form-group">
<label for="password" class="form-label">Nueva Contraseña</label>
<input type="password" class="form-control" id="password" name="password" required>
</div>
<button type="submit" class="btn btn-primary btn-block">Actualizar Contraseña</button>
</form>
<p class="text-center mt-3">
<a href="login.php">Iniciar Sesión</a>
</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
></script>
<script>
$(document).ready(function() {
$("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
    $(this).slideUp(500);
});
$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
$(this).slideUp(500);
});
});
</script>
</body>
</html>