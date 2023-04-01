<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "db_logistic", "Javier123.", "Db_Logistic");

// Comprobar conexión
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener los datos del formulario
$id_empleado = $_POST['id_empleado'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$id_puesto = $_POST['id_puesto'];

// Actualizar los datos del empleado en la base de datos
$sql = "UPDATE tbl_empleados SET primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido', fecha_ingreso = '$fecha_ingreso', id_puesto = '$id_puesto' WHERE id_empleado = $id_empleado";
if (mysqli_query($con, $sql)) {
    header("Location: index.php?mensaje=Los+datos+del+empleado+se+actualizaron+correctamente");
} else {
    echo "Error al actualizar los datos del empleado: " . mysqli_error($con);
}

// Cerrar conexión
mysqli_close($con);
?>
