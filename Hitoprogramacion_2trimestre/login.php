<?php

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge los datos del formulario
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Verifica el usuario en la base de datos
    $conn = new mysqli('localhost', 'root', '', 'webpost');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($password, $row['password'])) {
            // Inicio de sesión exitoso, guarda información en la sesión
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // Mostrar mensaje y diseño CSS aquí
            $success_message = "Usuario añadido correctamente.";
        } else {
            $error_message = "Contraseña incorrecta";
        }
    } else {
        $error_message = "Usuario no encontrado, debes registrarte antes";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
    <title>Iniciar Sesión</title>

</head>
<body>
<h2>Iniciar Sesión</h2>
<?php if ($error_message != '') { ?>
    <p class="error-message"><?php echo $error_message; ?></p>
    <a href="registro.php" class="register-button">Registrarte aquí</a>
<?php } ?>

<?php if ($success_message != '') { ?>
    <p class="message"><?php echo $success_message; ?></p>
    <a href="index.php"><button type="button">Volver a la página de inicio</button></a>
<?php } else { ?>
    <form action="login.php" method="post">
        <label for="correo">Correo:</label>
        <input type="text" name="correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
<?php } ?>
</body>
</html>


