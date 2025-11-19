<?php
// Incluye tu conexión
include 'conexion.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Especies</title>
    <style>
        /* Estilos básicos para la tabla */
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .accion-btn { text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; margin-right: 5px; }
    </style>
</head>
<body>

    <h1>Búsqueda de Especies</h1>
    
    <form action="buscar_especie.php" method="GET">
        <label for="termino">Buscar por Nombre:</label>
        <input type="text" id="termino" name="termino" required 
               value="<?php echo isset($_GET['termino']) ? htmlspecialchars($_GET['termino']) : ''; ?>">
        <button type="submit">Buscar</button>
    </form>

    <hr>

    <?php
    // Solo procesamos la búsqueda si se ha enviado el formulario (si existe el 'termino')
    if (isset($_GET['termino']) && !empty($_GET['termino'])) {
        
        // 1. Recibir y sanitizar el término de búsqueda
        $termino = $conn->real_escape_string($_GET['termino']);
        
        // 2. Consulta SQL con JOIN, WHERE, e incluyendo el ID para las acciones
        $sql = "SELECT
                    e.id AS ID,
                    e.nombre AS Especie,
                    e.nombreCientifico AS Cientifico,
                    g.nombre_grupo AS Grupo
                FROM
                    especies e
                INNER JOIN
                    grupobiologico g ON e.id_grupoBiologico = g.id
                WHERE
                    e.nombre LIKE '%$termino%' 
                ORDER BY e.nombre";

        $resultado = $conn->query($sql);

        // 3. Mostrar los resultados
        echo "<h2>Resultados para: " . htmlspecialchars($termino) . "</h2>";
        
        if ($resultado->num_rows > 0) {
            echo "<table border='1' style='width:100%;'>";
            echo "<thead><tr><th>Especie</th><th>Nombre Científico</th><th>Grupo Biológico</th><th>Acciones</th></tr></thead>";
            echo "<tbody>";

            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila["Especie"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["Cientifico"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["Grupo"]) . "</td>";
                // Enlaces de acciones, pasando el ID de la especie
                echo "<td>
                        <a href='editar_especie.php?id=" . $fila["ID"] . "' class='accion-btn'>Editar</a>
                        <a href='eliminar_especie.php?id=" . $fila["ID"] . "' class='accion-btn' onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta especie?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No se encontraron especies que coincidan con la búsqueda.</p>";
        }
    }
    
    $conn->close();
    ?>
</body>
</html>