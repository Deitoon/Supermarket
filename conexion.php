<?php
$servername = "localhost";  // Cambia si es necesario
$username = "root";         // Usuario de tu base de datos
$password = "";             // Contraseña de tu base de datos
$dbname = "supermercado";    // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>