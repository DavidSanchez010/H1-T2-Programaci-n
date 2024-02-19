<?php
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: index0.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Datos</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />

    <!-- Agrega cualquier estilo CSS necesario -->
</head>
<body>

<ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="newpost_form.php">New Post</a></li>
    <li><a href="info_bd.php">Informacion BD</a></li>
</ul>
<div class="cuerpoweb">
<h1>Datos almacenados en la base de datos</h1>
</div>
<?php


// Configuración de la conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'webpost', 3306);

// Verificar conexión
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los datos de la tabla 'posts'
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Mostrar los datos en forma de tabla

    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["titulo"] . "</h2>";
        echo "<p>Autor: " . $row["email"] . "</p>";
        echo "<p>Fecha de publicacion: " . $row["fecha_de_publicacion"] . "</p>";
        echo "<p>" . $row["contenido"] . "</p>";
        echo '<p><img src="' . $row["imagen"] . '"width="400px" height="400"></p>';
    }
}
