<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Código de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            text-align: center; /* Centrar el contenido */
        }

        .form-label {
            text-align: left; /* Para alinear las etiquetas a la izquierda */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <img src="../imagenes/logo_login.PNG" alt="Logo" style="height: 80px;" class="d-block mx-auto mb-4">
        <h3 class="mb-4">Crear Código de Gestión</h3>
        <form action="../sesiones/crear_arbol_gestion.php" method="post" class="mb-4">
            <div class="mb-3 text-start">
                <label for="id_codigo_gestion" class="form-label">ID Código Gestión:</label>
                <input type="text" id="id_codigo_gestion" name="id_codigo_gestion" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="codigo_gestion" class="form-label">Código Gestión:</label>
                <input type="text" id="codigo_gestion" name="codigo_gestion" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="prioridad" class="form-label">Prioridad:</label>
                <input type="text" id="prioridad" name="prioridad" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="agrupador" class="form-label">Agrupador:</label>
                <input type="text" id="agrupador" name="agrupador" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-2">Enviar</button>
        </form>
        <a href="../publico/index_arbol_gestion.php" class="btn btn-secondary btn-block mb-2">Ver Códigos de Gestión</a>
        <br>
        <br>
        <a href="../index.php" class="btn btn-danger btn-block">Volver al Inicio</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
