<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge los datos del formulario
    $correo = $_POST['correo'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash de la contraseña
    $hashed_contraseña = password_hash($password, PASSWORD_DEFAULT);

    // Realiza las validaciones necesarias

    // Inserta el usuario en la base de datos
    $conn = new mysqli('localhost', 'root', '', 'webpost');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (correo, username, password) VALUES ('$correo', '$username', '$hashed_contraseña')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirige a la página de inicio de sesión
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
    <title>Registro</title>

</head>
<body>
<h2>Registro</h2>
<form action="registro.php" method="post">
    <label for="correo">Correo:</label>
    <input type="text" name="correo" required>

    <label for="username">Nombre de Usuario:</label>
    <input type="text" name="username" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit">Registrarse</button>
</form>

<form action="login.php">
    <button type="submit">Iniciar Sesión</button>
</form>
</body>
</html>


