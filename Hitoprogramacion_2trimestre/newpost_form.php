<?php
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: index0.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Nuevo Post</title>
    <!-- CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet" type="text/css" />

</head>
<body>
<ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="newpost_form.php">New Post</a></li>
    <li><a href="info_bd.php">Informacion BD</a></li>
</ul>

<div class="container">
    <div class="cuerpoweb">
    <h2>Nuevo Post</h2>
    <form action="new_post.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <input type="text" step="0.01" class="form-control" id="contenido" name="contenido" required>
        </div>
        <div class="form-group">
            <label for="fecha_de_publicacion">Fecha de publicacion:</label>
            <input type="date" class="form-control" id="fecha_de_publicacion" name="fecha_de_publicacion" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="text" class="form-control" id="imagen" name="imagen" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
</div>
<!-- JS de Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
