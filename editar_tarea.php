<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");

// Verifica si el formulario ha sido enviado
if (isset($_POST['enviar'])) {
    // Obtiene los valores del formulario
    $id = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Descripción = $_POST['Descripción'];
    $estado = $_POST['estado'];
    $usuario_asignado = $_POST['usuario_asignado'];

    // Construye la consulta SQL para actualizar una tarea
    $sql = "UPDATE tareas SET Nombre='$Nombre', Descripción='$Descripción', estado='$estado', usuario_asignado='$usuario_asignado' WHERE ID='$id'";
    $resultado = mysqli_query($conexion, $sql);

    // Verifica si la consulta se ejecutó correctamente
    if ($resultado) {
        echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('index.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
            alert('Los datos no se actualizaron');
            location.assign('index.php');
        </script>";
    }
} else {
    // Obtiene el ID de la tarea a editar desde la URL
    $id = $_GET['id'];

    // Consulta la tarea correspondiente al ID
    $sql = "SELECT * FROM tareas WHERE ID = $id";
    $resultado = mysqli_query($conexion, $sql);

    // Verifica si se encontró la tarea
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $Nombre = $fila["Nombre"];
        $Descripción = $fila["Descripción"];
        $estado = $fila["estado"];
        $usuario_asignado = $fila["usuario_asignado"];
    } else {
        // Si no se encuentra la tarea, muestra un mensaje
        echo "Usuario no encontrado.";
        $Nombre = "";
        $Descripción = "";
        $estado = "";
        $usuario_asignado = "";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>

<html>
<head>
    <title>Editar usuario</title>
</head>
<body>
    <h1>Editar usuario</h1>
    <!-- Formulario para editar una tarea -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $Nombre; ?>"> <br>
        <label for="">Descripción</label>
        <input type="text" name="Descripción" value="<?php echo $Descripción; ?>"> <br>
        <label for="">Estado de la tarea</label>
        <input type="text" name="estado" value="<?php echo $estado; ?>"> <br>
        <label for="">ID del usuario asignado a esta tarea</label>
        <input type="text" name="usuario_asignado" value="<?php echo $usuario_asignado; ?>"> <br>
        <input type="hidden" name="ID" value="<?php echo $id; ?>"> <br>
        <input type="submit" name="enviar" value="Actualizar">
        <a href="index.php">REGRESAR</a>
    </form>
</body>
</html>
