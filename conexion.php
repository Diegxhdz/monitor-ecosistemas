<?php
// Datos de conexión para XAMPP
$servidor = "localhost";
$usuario = "root";       // Usuario por defecto de XAMPP
$password = "";          // Contraseña por defecto de XAMPP (vacía)
$base_datos = "nautilus_db"; // El nombre de la base de datos que creaste

// Crear la conexión usando la extensión MySQLi
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar si la conexión falló
if ($conn->connect_error) {
    die("Error de Conexión: " . $conn->connect_error);
}
// Si la conexión es exitosa, la variable $conn contiene el objeto de conexión
?>