<?php
session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    // Validación básica
    if (empty($usuario) || empty($password) || strlen($usuario) > 30) {
        header("Location: index.php?error=Usuario o contraseña inválidos");
        exit();
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['contraseña'])) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            $_SESSION['ultima_actividad'] = time();
            session_regenerate_id(true);

            switch ($user['tipo_usuario']) {
                case 'administrador':
                    header("Location: ../usuarios/administrador/inicio_administrador.php");
                    break;
                case 'moderador':
                    header("Location: moderador/inicio_moderador.php");
                    break;
                case 'empresa':
                    header("Location: empresa/inicio_empresa.php");
                    break;
                case 'institucion':
                    header("Location: institucion/inicio_institucion.php");
                    break;
                case 'maestro':
                    header("Location: maestro/inicio_maestro.php");
                    break;
                case 'alumno':
                    header("Location: alumno/inicio_alumno.php");
                    break;
                default:
                    header("Location: index.php?error=Tipo de usuario no reconocido");
            }
            exit();
        } else {
            header("Location: index.php?error=Usuario o contraseña incorrectos");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Error en la consulta: " . $e->getMessage());
        header("Location: index.php?error=Error en el servidor");
        exit();
    }
}
?>