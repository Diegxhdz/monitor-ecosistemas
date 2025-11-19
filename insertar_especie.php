<?php
// Incluye tu archivo de conexión (asumiendo que lo moviste a la carpeta Proyecto)
include 'conexion.php'; 

// 1. Consulta para obtener todos los grupos biológicos
$sql_grupos = "SELECT id, nombre_grupo FROM grupoBiologico ORDER BY nombre_grupo";
$resultado_grupos = $conn->query($sql_grupos);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insertar Nueva Especie</title>
</head>
<body>

    <h1>Añadir Nueva Especie</h1>

    <form action="procesar_insercion.php" method="POST">
        
        <label for="nombre">Nombre Común:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="nombreCientifico">Nombre Científico:</label><br>
        <input type="text" id="nombreCientifico" name="nombreCientifico" required><br><br>

        <label for="id_grupoBiologico">Grupo Biológico:</label><br>
        <select id="id_grupoBiologico" name="id_grupoBiologico" required>
            <option value="">Selecciona un Grupo</option>
            <?php
            // 3. Llenar el <select> con los datos de la base de datos
            if ($resultado_grupos->num_rows > 0) {
                while($grupo = $resultado_grupos->fetch_assoc()) {
                    // El valor que se envía al servidor es el ID (Llave Foránea)
                    echo "<option value='" . $grupo["id"] . "'>" . $grupo["nombre_grupo"] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <button type="submit">Guardar Especie</button>
    </form>

<?php 
$conn->close(); // Cerrar la conexión
?>
</body>
</html>