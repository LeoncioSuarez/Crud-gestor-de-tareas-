<?php
    // Incluye el archivo de conexión a la base de datos
    include("conexion.php");

    // Verifica si el formulario ha sido enviado
    if(isset($_POST['enviar'])){
        // Obtiene los valores del formulario
        $id = $_POST['ID'];
        $nombre = $_POST["nombre"];
        $cedula = $_POST["cedula"];
        $correo = $_POST["Correo"];

        // Construye la consulta SQL para actualizar un usuario
        $sql = "UPDATE usuario SET nombre='$nombre', Cedula='$cedula', Correo='$correo' WHERE ID='$id'";
        $resultado = mysqli_query($conexion, $sql);

        // Verifica si la consulta se ejecutó correctamente
        if($resultado){
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
        // Obtiene el ID del usuario a editar desde la URL
        $id = $_GET['id'];

        // Consulta el usuario correspondiente al ID
        $sql = "SELECT * FROM usuario WHERE ID = $id";
        $resultado = mysqli_query($conexion, $sql);

        // Verifica si se encontró el usuario
        if(mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $nombre = $fila["Nombre"];
            $cedula = $fila["Cedula"];
            $correo = $fila["Correo"];
        } else {
            // Si no se encuentra el usuario, muestra un mensaje
            echo "Usuario no encontrado.";
            $nombre = "";
            $cedula = "";
            $correo = "";
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
    <!-- Formulario para editar un usuario -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>
        <label for="">Cédula</label>
        <input type="text" name="cedula" value="<?php echo $cedula; ?>"> <br>
        <label for="">Correo electrónico</label>
        <input type="text" name="Correo" value="<?php echo $correo; ?>"> <br>
        <input type="hidden" name="ID" value="<?php echo $id; ?>"> <br>
        <input type="submit" name="enviar" value="Actualizar">
        <a href="index.php">REGRESAR</a>
    </form>
</body>
</html>
