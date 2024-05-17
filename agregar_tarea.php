<html>
<head>
    <title>Agregar</title>
</head>
<body>
<?php
    // Verifica si el formulario ha sido enviado
    if (isset($_POST['enviar'])) {
        // Obtiene los valores del formulario
        $Nombre = $_POST['Nombre'];
        $Descripción = $_POST['Descripción'];
        $estado = $_POST['estado'];
        $usuario_asignado = $_POST['usuario_asignado'];

        // Incluye el archivo de conexión a la base de datos
        include("conexion.php");

        // Construye la consulta SQL para insertar una nueva tarea
        $sql = "INSERT INTO tareas (Nombre, Descripción, estado, usuario_asignado) VALUES ('".mysqli_real_escape_string($conexion, $Nombre)."', '".mysqli_real_escape_string($conexion, $Descripción)."', '".mysqli_real_escape_string($conexion, $estado)."', '".mysqli_real_escape_string($conexion, $usuario_asignado)."')";

        // Ejecuta la consulta
        $resultado = mysqli_query($conexion, $sql);

        // Verifica si la consulta se ejecutó correctamente
        if ($resultado) {
            echo "<script language='JavaScript'>
                alert('Los datos fueron ingresados correctamente a la BD');
                location.assign('index.php');
            </script>";
        } else {
            echo "<script language='JavaScript'>
                alert('ERROR: Los datos no fueron ingresados a la BD');
                location.assign('index.php');
            </script>"; 
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    }
?>
    <h1>Agregar usuario</h1>
    <!-- Formulario para agregar un nuevo usuario -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre</label>
        <input type="text" name="Nombre"> <br>
        <label for="">Descripción</label>
        <input type="text" name="Descripción"> <br>
        <label for="">Estado de la tarea</label>
        <input type="text" name="estado"> <br>
        <label for="">ID del usuario asignado a esta tarea</label>
        <input type="text" name="usuario_asignado"> <br>
        <input type="submit" name="enviar" value="Agregar">
        <a href="index.php">Regresar</a>
    </form>
</body>
</html>
