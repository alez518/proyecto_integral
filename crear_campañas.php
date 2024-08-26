<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Campañas</title>
    <br>
<br>
    <!-- Bootstrap CSS -->
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
    max-width: 400px;
    margin-top: 50px;
    padding: 20px;
    backdrop-filter: blur(8px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8); /* Sombra con 50% de opacidad */
    border-radius: 30px;
}
</style>
</head>
<body>
<div class="container mt-5">
<img src="../imagenes/logo_login.PNG" alt="Logo" style="height: 80px;" class="d-block mx-auto">
    <h1 class="text-center mb-4">Crear Campañas</h1>
    <form action="../sesiones/crear_campañas.php" method="post">
        <div class="form-group">
            <label for="id_campaña">id_campaña:</label>
            <input type="text" class="form-control" id_campaña="id_campaña" name="id_campaña" required>
        </div>
        <div class="form-group">
            <label for="nombre_campaña">Nombre_campaña:</label>
            <input type="text" class="form-control" id_campaña="nombre_campaña" name="nombre_campaña" required>
        </div>
        <div class="form-group">
            <label for="tipo_campaña">Tipo_campaña:</label>
            <input type="text" class="form-control" id_campaña="tipo_campaña" name="tipo_campaña" required>
        </div>
        <div class="form-group">
            <label for="etapa_campaña">Etapa_campaña:</label>
            <input type="text" class="form-control" id_campaña="etapa_campaña" name="etapa_campaña" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    </form>
    <p class="text-center mt-3">
<a href="../publico/index.php">Ver Campañas</a>
<br>
<br>
<a href="../index.php" class="btn btn-danger">Volver al Inicio</a>
<br>
</p>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
