<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="recursos/css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet"> <!-- Para Roboto -->
</head>
<body>
    <!-- Logo en el fondo de la página convertido en botón -->
    <div class="background-logo">
        <a href="../index.php">
            <img src="recursos/imagenes/logo-fondo.png" alt="Logo de fondo">
        </a>
    </div>


    <div class="login-container">
        <!-- Logo dentro del formulario -->
        <div class="form-logo">
            <img src="recursos/imagenes/logo-formulario.png" alt="Logo del formulario">
        </div>
        <div class="login-header">
            <h1>Iniciar Sesión - OTra prueba</h1>
        </div>
        <form action="includes/inicio_sesion.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required placeholder="Ingresa tu usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
            </div>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
        <?php
        // Mostrar mensaje de error si existe
        if (isset($_GET['error'])) {
            echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        <div class="register-link">
            <label>¿No tienes cuenta?</label>
            <a href="alumno/registrar_alumno.php">Regístrate</a>
        </div>
    </div>
</body>
</html>