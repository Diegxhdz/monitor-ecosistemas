<?php
// Incluye tu conexión
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Recibir y sanitizar datos (incluyendo el ID oculto)
    $id = (int)$_POST['id'];
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $nombreCientifico = $conn->real_escape_string($_POST['nombreCientifico']);
    // Usamos el nombre de campo del formulario: 'id_grupoBiologico'
    $id_grupo = (int)$_POST['id_grupoBiologico']; 

    // 2. Crear la consulta SQL de ACTUALIZACIÓN (UPDATE)
    $sql = "UPDATE especies 
            SET nombre = '$nombre', 
                nombreCientifico = '$nombreCientifico', 
                id_grupoBiologico = $id_grupo
            WHERE id = $id";

    // 3. Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Mensaje de éxito y enlace para volver al listado
        echo "<h1>¡Especie actualizada exitosamente!</h1>";
        echo "<p>La especie con ID $id ha sido modificada.</p>";
        echo "<a href='buscar_especie.php'>Ver las especies actualizadas</a>";
    } else {
        echo "Error al actualizar la especie: " . $conn->error;
    }
} else {
    // Si alguien intenta acceder directamente, redirigir al listado
    header("Location: buscar_especie.php");
    exit();
}

$conn->close();
?>