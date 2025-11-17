<?php
// en xamp debes de ubicarlo en htdocs
$servidor = "localhost";
$usuario = "root";
$contraseña = "rootroot";
$base_de_datos = "practicar";


$conexion = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

echo "¡Conexión exitosa!";


$conexion->close();
?>
