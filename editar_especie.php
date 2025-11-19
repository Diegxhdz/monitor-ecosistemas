<?php
// Incluye tu conexión
include 'conexion.php'; 

$id_especie = isset($_GET['id']) ? (int)$_GET['id'] : 0; // Obtiene el ID de la URL

if ($id_especie > 0) {
    // 1. Obtener los datos de la especie a editar
    // Usamos los nombres de columna confirmados: id, nombre, nombreCientifico, id_grupoBiologico
    $sql_especie = "SELECT id, nombre, nombreCientifico, id_grupoBiologico 
                    FROM especies WHERE id = $id_especie";
    $res_especie = $conn->query($sql_especie);
    
    if ($res_especie->num_rows == 0) {
        die("Error: Especie no encontrada.");
    }
    $datos_especie = $res_especie->fetch_assoc();

    // 2. Obtener todos los grupos para llenar el menú SELECT
    // Usamos los nombres de columna confirmados: id, nombre_grupo
    $sql_grupos = "SELECT id, nombre_grupo FROM grupobiologico ORDER BY nombre_grupo";
    $resultado_grupos = $conn->query($sql_grupos);
} else {
    die("Error: ID de especie inválido.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Especie</title>
</head>
<body>
    <h1>Editar Especie: <?php echo htmlspecialchars($datos_especie['nombre']); ?></h1>

    <form action="procesar_edicion.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $datos_especie['id']; ?>">
        
        <label for="nombre">Nombre Común:</label><br>
        <input type="text" id="nombre" name="nombre" required 
               value="<?php echo htmlspecialchars($datos_especie['nombre']); ?>"><br><br>

        <label for="nombreCientifico">Nombre Científico:</label><br>
        <input type="text" id="nombreCientifico" name="nombreCientifico" required 
               value="<?php echo htmlspecialchars($datos_especie['nombreCientifico']); ?>"><br><br>

        <label for="id_grupoBiologico">Grupo Biológico:</label><br>
        <select id="id_grupoBiologico" name="id_grupoBiologico" required>
            <?php
            // 3. Recorrer los grupos y marcar el que ya tiene la especie
            while($grupo = $resultado_grupos->fetch_assoc()) {
                // Comparamos el ID del grupo con el ID del grupo de la especie
                $selected = ($grupo['id'] == $datos_especie['id_grupoBiologico']) ? 'selected' : '';
                echo "<option value='{$grupo["id"]}' $selected>" . htmlspecialchars($grupo["nombre_grupo"]) . "</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
    
    <br><a href="buscar_especie.php">Volver a la búsqueda</a>

<?php $conn->close(); ?>
</body>
</html>