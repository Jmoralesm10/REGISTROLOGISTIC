<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre1"]) || empty($_POST["txtNombre2"]) || empty($_POST["txtApellido1"]) || empty($_POST["txtApellido2"]) || empty($_POST["txtFecha_ingreso"])|| empty($_POST["txtPuesto"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre1 = $_POST["txtNombre1"];
    $nombre2 = $_POST["txtNombre2"];
    $apellido1 = $_POST["txtApellido1"];
    $apellido2 = $_POST["txtApellido2"];
    $fecha_ingreso = $_POST["txtFecha_ingreso"];
    $puesto = $_POST["txtPuesto"];
    
    $sentencia = $bd->prepare("INSERT INTO tbl_empleados (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_ingreso, id_puesto) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre1, $nombre2, $apellido1, $apellido2, $fecha_ingreso, $puesto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>