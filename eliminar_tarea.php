<?php
// Obtiene el ID del alumno a eliminar desde la URL
$id = $_GET['id'];

// Incluye el archivo de conexión a la base de datos
include("conexion.php");

// Verifica si la conexión se ha realizado correctamente
if (!$conexion) {
    // Si la conexión falla, muestra un mensaje de error y termina la ejecución del script
    die("Conexión fallida: " . mysqli_connect_error());
}

// Construye la consulta SQL para eliminar un alumno
$sql = "DELETE FROM tareas WHERE ID = '".mysqli_real_escape_string($conexion, $id)."'";
$resultado = mysqli_query($conexion, $sql);

// Verifica si la consulta se ejecutó correctamente
if ($resultado) {
    // Si la consulta se ejecuta correctamente, muestra un mensaje de éxito y redirige a la página de inicio
    echo "<script language='JavaScript'>
        alert('Los datos se eliminaron correctamente');
        location.assign('index.php');
    </script>";
} else {
    // Si la consulta falla, muestra un mensaje de error y redirige a la página de inicio
    echo "<script language='JavaScript'>
        alert('No se pudo eliminar los datos');
        location.assign('index.php');
    </script>";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
