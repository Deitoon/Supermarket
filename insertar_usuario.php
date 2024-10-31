<?php
// Mostrar todos los errores de PHP (útil para depuración)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el formulario ha sido enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y sanitizar los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $id_rol = $_POST['id_rol'];

    // Validación básica para asegurarse de que los campos requeridos no estén vacíos
    if (empty($nombre) || empty($email) || empty($contraseña) || empty($id_rol)) {
        die("Por favor, completa todos los campos obligatorios.");
    }

    // Cifrar la contraseña antes de guardarla en la base de datos
    $contraseña_cifrada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Consulta SQL para insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, contraseña, direccion, telefono, id_rol)
            VALUES ('$nombre', '$email', '$contraseña_cifrada', '$direccion', '$telefono', '$id_rol')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado exitosamente";
    } else {
        echo "Error al agregar el usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
