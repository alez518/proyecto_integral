<?php
session_start();
include('config/db.php');


// Inicializar variable de error
$error = '';

try {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usuario = $_POST['usuario'];
$password = $_POST['password'];

if (!empty($usuario) && !empty($password)) {
// Preparar la consulta SQL
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
$stmt->execute(['usuario' => $usuario]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se obtuvo el usuario
if ($user) {
// Verificar la contraseña
if (password_verify($password, $user['password'])) {
$_SESSION['user_id'] = $user['id'];
header("Location: index.php");
exit();
} else {
    $error = "Credenciales incorrectas: la contraseña no coincide.";
    }
    } else {
    $error = "Credenciales incorrectas: el correo electrónico no existe.";
    }
    } else {
    $error = "Por favor, complete todos los campos.";
    }
    }
    } catch (PDOException $e) {
    $error = "Error de base de datos: " . $e->getMessage();
    } catch (Exception $e) {
    $error = "Error del servidor: " . $e->getMessage();
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesión</title>
<link 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<br>
<br>
<h1 style="color: lightgray; text-align: center;">Bienvenido a Integral</h1>
<br>
<style>
body {
    
    background-image: url("imagenes/fondo_login.jpg");
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
    backdrop-filter: blur(15px);
    background: rgba(255, 255, 255, 0.1); /* Fondo blanco con 50% de opacidad */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Sombra con 50% de opacidad */
    border-radius: 30px;
}

</style>
</head>
<body>
<div class="container" style="text-align: center;">
<img src="imagenes\logo_login.PNG" alt="Logo" style="height: 80px;"></a>
<h2 class="text-center">INTEGRAL</h2>
<?php if (!empty($error)): ?>
<div class="alert alert-danger" id="error-alert">
<?php echo $error; ?>
</div>
<?php endif; ?>
<form action="login.php" method="post">
<div class="form-group">
<label for="usuario" class="form-label">Usuario</label>
<input type="usuario" class="form-control" id="usuario" name="usuario" required>
</div>
<div class="form-group">
<label for="password" class="form-label">Contraseña</label>
<input type="password" class="form-control" id="password" 
name="password" required>
</div>
<button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
</form>
<p class="text-center mt-3">
<a href="login_registro.php">Registrarse - </a> 
<a href="recuperar_contraseña.php">Recuperar Contraseña</a>
</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
></script>
<script>
$(document).ready(function() {
$("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
$(this).slideUp(500);
});
});
</script>
</body>
</html>
