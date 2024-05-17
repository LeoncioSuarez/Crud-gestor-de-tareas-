<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");

// Consulta para seleccionar todos los registros de la tabla 'usuario'
$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $sql);

// Consulta para seleccionar todos los registros de la tabla 'tareas'
$sqltarea = "SELECT * FROM tareas";
$resultadotarea = mysqli_query($conexion, $sqltarea);
?>

<html>
<head>
    <title>Lista de usuarios</title>
</head>
<body>
    <!-- Enlace para agregar un nuevo usuario -->
    <a href="agregar_usuario.php">Nuevo usuario</a><br><br>
    
    <!-- Tabla para mostrar la lista de usuarios -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Itera sobre los resultados de la consulta de usuarios y genera las filas de la tabla
            while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td> <?php echo $filas['ID']; ?> </td>
                <td> <?php echo $filas['Nombre']; ?> </td>
                <td> <?php echo $filas['Cedula']; ?> </td>
                <td> <?php echo $filas['Correo']; ?> </td>
                <td>
                    <!-- Enlaces para editar y eliminar el usuario actual -->
                    <?php echo "<a href='editar_usuario.php?id=" . $filas['ID'] . "'>EDITAR</a>"; ?>
                    <?php echo "<a href='eliminar_usuario.php?id=" . $filas['ID'] . "'>ELIMINAR</a>"; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>
    <!-- Enlace para agregar una nueva tarea -->
    <a href="agregar_tarea.php">Nueva tarea</a><br><br>
    
    <!-- Tabla para mostrar la lista de tareas -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Usuario asignado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Itera sobre los resultados de la consulta de tareas y genera las filas de la tabla
            while ($filas = mysqli_fetch_assoc($resultadotarea)) {
            ?>
            <tr>
                <td> <?php echo $filas['ID']; ?> </td>
                <td> <?php echo $filas['Nombre']; ?> </td>
                <td> <?php echo $filas['Descripción']; ?> </td>
                <td> <?php echo $filas['estado']; ?> </td>
                <td> <?php echo $filas['usuario_asignado']; ?> </td>
                <td>
                    <!-- Enlaces para editar y eliminar la tarea actual -->
                    <?php echo "<a href='editar_tarea.php?id=" . $filas['ID'] . "'>EDITAR</a>"; ?>
                    <?php echo "<a href='eliminar_tarea.php?id=" . $filas['ID'] . "'>ELIMINAR</a>"; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
    ?>
</body>
</html>
