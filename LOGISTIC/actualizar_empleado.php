<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "db_logistic", "Javier123.", "Db_Logistic");

// Comprobar conexión
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener el id_empleado enviado desde la página anterior
$id_empleado = $_POST['id_empleado'];

// Obtener los datos del empleado a actualizar
$sql = "SELECT * FROM tbl_empleados WHERE id_empleado = $id_empleado";
$resultado = mysqli_query($con, $sql);
$empleado = mysqli_fetch_assoc($resultado);

// Cerrar conexión
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar empleado</title>
</head>
<body>
    <h1>Actualizar empleado</h1>
    <form action="guardar_actualizacion.php" method="post">
        <input type="hidden" name="id_empleado" value="<?php echo $empleado['id_empleado']; ?>">
        <label for="primer_nombre">Primer Nombre:</label>
        <input type="text" name="primer_nombre" value="<?php echo $empleado['primer_nombre']; ?>"><br>
        <label for="segundo_nombre">Segundo Nombre:</label>
        <input type="text" name="segundo_nombre" value="<?php echo $empleado['segundo_nombre']; ?>"><br>
        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" name="primer_apellido" value="<?php echo $empleado['primer_apellido']; ?>"><br>
        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido" value="<?php echo $empleado['segundo_apellido']; ?>"><br>
        <label for="fecha_ingreso">Fecha de Ingreso:</label>
        <input type="date" name="fecha_ingreso" value="<?php echo $empleado['fecha_ingreso']; ?>"><br>
        <label for="id_puesto">ID Puesto:</label>
        <input type="text" name="id_puesto" value="<?php echo $empleado['id_puesto']; ?>"><br>
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>
