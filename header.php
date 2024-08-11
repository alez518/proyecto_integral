<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>INTEGRAL</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    
    background-image: url("imagenes/fondo_login.JPG");
    background-size: cover; /* Ajusta la imagen para cubrir toda la pantalla */
    background-position: center; /* Centra la imagen */
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0; 
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<a class="navbar-brand" href="index.php" style="color: white;">
<img src="imagenes\logo_integral.png" alt="Logo" style="height: 45px;"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="login.php">Iniciar Sesión</a>
<li class="nav-item">
<a class="nav-link" href="login_registro.php">Registrarse</a> 
<li class="nav-item">
<a class="nav-link"href="../Sesiones/crear_clientes.php">Crear Clientes</a>
<li class="nav-item">
<a class="nav-link"href="./vistas/crear_campañas.php">Crear Campañas</a>
<li class="nav-item">
<a class="nav-link"href="gestion_clientes.php">Gestion clientes</a>
<li class="nav-item">
<a class="nav-link"href="test.connection.php">Informes</a>
<li class="nav-item">
<a class="nav-link" href="cerrar_sesion">Cerrar</a>
</li>
</ul>
</div>
</div>
</nav>
