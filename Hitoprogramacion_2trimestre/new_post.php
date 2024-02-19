<?php
// Configuración de la conexión a la base de datos
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: index0.php");
    exit;
}

// Crear conexión
$conn = new mysqli('localhost', 'root', '', 'webpost',3306);
// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recoger los datos del formulario
$email = $_POST['email'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha_de_publicacion = $_POST['fecha_de_publicacion'];
$imagen = $_POST['imagen'];


// Iniciar temporizador
$time_start = microtime(true);

// Insertar datos en la tabla
$sql = "INSERT INTO posts (email, titulo, contenido, fecha_de_publicacion,imagen)
VALUES ('$email', '$titulo', '$contenido', '$fecha_de_publicacion','$imagen')";


if ($conn->query($sql) === TRUE) {
    echo '<head><link href="estilos.css" rel="stylesheet" type="text/css" /></head>';
    echo '<body>';
    echo '<header>';
    echo '<ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="newpost_form.php">New Post</a></li>
    <li><a href="info_bd.php">Informacion BD</a></li>
</ul>';
    echo '</header>';
    echo '<div class="cuerpoweb">';

    echo "<p>Nuevo post añadido con éxito.</p>";
    echo '</div>';
    echo '</body>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Contar los productos en la base de datos
$sql = "SELECT COUNT(*) as count FROM posts";
$result = $conn->query($sql);
