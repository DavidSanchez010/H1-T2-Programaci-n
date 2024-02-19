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
    <title>Diferencias de Lenguajes</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />

</head>
<body>

<ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="newpost_form.php">New Post</a></li>
    <li><a href="info_bd.php">Informacion BD</a></li>
</ul>
<div class="cuerpoweb">
<h1>DIFERENCIAS DE LENGUAJES</h1>

<h2>Lenguajes Procedimentales:</h2>
<p>
    Estos lenguajes se centran en los procedimientos o funciones, que son bloques de código que realizan tareas específicas.
    La manipulación de datos se realiza mediante funciones y estructuras de control de flujo.
    Ejemplos: C, Pascal y Fortran son ejemplos de lenguajes procedimentales clásicos.
    La modularidad se logra mediante la división del código en procedimientos.
</p>

<h2>Lenguajes Orientados a Objetos:</h2>
<p>
    Se centran en la creación y manipulación de objetos, que son instancias de clases que encapsulan datos y comportamiento.
    Los datos y los métodos que operan en esos datos están encapsulados en objetos.
    Ejemplos: Java, C++, Python y C# son ejemplos de lenguajes orientados a objetos.
    Características como la herencia permiten la reutilización de código, y el polimorfismo permite que un objeto pueda tomar muchas formas.
</p>

<h2>Lenguajes Orientados a Eventos:</h2>

    Estos lenguajes se centran en la interacción basada en eventos, donde las acciones del usuario o cambios en el sistema generan eventos.
    La lógica del programa se activa por eventos, como clics del mouse, teclas presionadas, etc.
    Ejemplos: JavaScript (en el contexto de navegadores web), Visual Basic y algunos aspectos de Java y C#.
    Se utiliza un mod

</div>
</body>

