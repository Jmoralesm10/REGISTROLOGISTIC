<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "db_logistic", "Javier123.", "Db_Logistic");

// Comprobar conexión
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener el ID del empleado a eliminar
$id_empleado = $_POST['id_empleado'];

// Eliminar el empleado de la base de datos
$sql = "DELETE FROM tbl_empleados WHERE id_empleado = $id_empleado";
if (mysqli_query($con, $sql)) {
    header("Location: index.php?mensaje=Los+datos+del+empleado+se+actualizaron+correctamente");
} else {
    echo "Error al eliminar el empleado: " . mysqli_error($con);
}

// Cerrar conexión
mysqli_close($con);
?>
