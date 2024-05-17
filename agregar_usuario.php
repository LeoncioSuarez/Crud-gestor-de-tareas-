<html>
<head>
    <title>agregar</title>
</head>
<body>
<?php
    // Verifica si el formulario ha sido enviado
    if (isset($_POST['enviar'])) {
        // Obtiene los valores del formulario
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $correo = $_POST['Correo'];

        // Incluye el archivo de conexión a la base de datos
        include("conexion.php");

        // Construye la consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO usuario (Nombre, Cedula, Correo) VALUES ('".mysqli_real_escape_string($conexion, $nombre)."', '".mysqli_real_escape_string($conexion, $cedula)."', '".mysqli_real_escape_string($conexion, $correo)."')";

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
        <input type="text" name="nombre"> <br>
        <label for="">Cédula</label>
        <input type="text" name="cedula"> <br>
        <label for="">Correo electrónico</label>
        <input type="text" name="Correo"> <br>
        <input type="submit" name="enviar" value="Agregar">
        <a href="index.php">REGRESAR</a>
    </form>
</body>
</html>
