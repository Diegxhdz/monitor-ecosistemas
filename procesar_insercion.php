<?php
// Incluye tu archivo de conexión
include 'conexion.php'; 

// 1. Verificar que los datos del formulario fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Recoger y "sanitizar" los datos para prevenir inyección SQL
    // mysqli_real_escape_string hace que los datos sean seguros para la DB
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $nombreCientifico = $conn->real_escape_string($_POST['nombreCientifico']);
    $id_grupo = $_POST['id_grupoBiologico']; // Este es un entero, no necesita sanitización de string

    // 3. Crear la consulta SQL para INSERTAR
    $sql = "INSERT INTO especies (nombre, nombreCientifico, id_grupoBiologico) 
            VALUES ('$nombre', '$nombreCientifico', $id_grupo)";

    // 4. Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "¡Nueva especie registrada exitosamente!";
    } else {
        echo "Error al registrar la especie: " . $conn->error;
    }
} else {
    // Si alguien intenta acceder directamente a este archivo, lo redirigimos
    header("Location: insertar_especie.php");
    exit();
}

$conn->close();
?>