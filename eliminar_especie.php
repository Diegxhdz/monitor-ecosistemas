<?php
// Incluye tu conexión (usando la ruta correcta)
include 'conexion.php'; 

// 1. Obtener el ID de la especie desde la URL y asegurar que es un número entero
$id_especie = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_especie > 0) {
    
    // 2. Crear la consulta SQL de ELIMINACIÓN (DELETE)
    // Se elimina el registro de la tabla 'especies' cuyo ID coincide con el ID recibido.
    $sql = "DELETE FROM especies WHERE id = $id_especie";

    // 3. Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<h1>¡Especie Eliminada!</h1>";
        echo "<p>El registro con ID $id_especie ha sido eliminado exitosamente de la base de datos.</p>";
        
        // Opcional: Redirigir al usuario automáticamente al listado después de 3 segundos
        echo "<meta http-equiv='refresh' content='3;url=buscar_especie.php'>";
        
    } else {
        echo "Error al eliminar la especie: " . $conn->error;
        
        // El error más común aquí sería si existen tablas relacionadas
        // que tienen una restricción (como si tuvieras una tabla 'avistamientos' 
        // que aún referencia esta especie).
    }
} else {
    echo "Error: ID de especie no válido.";
}

$conn->close();
?>