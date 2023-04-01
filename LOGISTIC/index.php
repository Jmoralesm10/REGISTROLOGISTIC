<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from tbl_empleados");
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Id empleado</th>
                                <th scope="col">Primer Nombre</th>
                                <th scope="col">Segundo Nombre</th>
                                <th scope="col"> Primer Apellido</th>
                                <th scope="col"> Segundo Apellido</th>
                                <th scope="col">Fecha_ingreso</th>
                                <th scope="col">Puesto</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php
                                // Conexión a la base de datos
                                $con = mysqli_connect("localhost", "db_logistic", "Javier123.", "Db_Logistic");

                                // Comprobar conexión
                                if (mysqli_connect_errno()) {
                                    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
                                    exit();
                                }

                                // Obtener registros de la tabla tbl_empleados
                                $sql = "SELECT id_empleado, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_ingreso, id_puesto FROM tbl_empleados";
                                $resultado = mysqli_query($con, $sql);

                                // Mostrar registros en la tabla
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $fila['id_empleado'] . "</td>";
                                    echo "<td>" . $fila['primer_nombre'] . "</td>";
                                    echo "<td>" . $fila['segundo_nombre'] . "</td>";
                                    echo "<td>" . $fila['primer_apellido'] . "</td>";
                                    echo "<td>" . $fila['segundo_apellido'] . "</td>";
                                    echo "<td>" . $fila['fecha_ingreso'] . "</td>";
                                    echo "<td>" . $fila['id_puesto'] . "</td>";
                                    echo "<td>";
                                    echo "<form action='actualizar_empleado.php' method='post'>";
                                    echo "<input type='hidden' name='id_empleado' value='" . $fila['id_empleado'] . "'>";
                                    echo "<input type='submit' value='Actualizar'>";
                                    echo "</form>";
                                    echo "<form action='eliminar_empleado.php' method='post'>";
                                    echo "<input type='hidden' name='id_empleado' value='" . $fila['id_empleado'] . "'>";
                                    echo "<input type='submit' value='Eliminar'>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }

                                // Cerrar conexión
                                mysqli_close($con);
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Primer Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre1" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Segundo Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre2" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido1" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Segundo Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido2" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha_ingreso: </label>
                        <input type="text" class="form-control" name="txtFecha_ingreso" placeholder="Año-Mes-Dia" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto: </label>
                        <input type="text" class="form-control" name="txtPuesto" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>