<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $imagen_url = $_POST['imagen_url'];

    // Consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria, imagen_url)
            VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$categoria', '$imagen_url')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado exitosamente";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
