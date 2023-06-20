<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estlosadmin.css?=<?php echo(rand()); ?>">
    <title>Document</title>
</head>
<body>
    <section id="cont-superior">
        <h1>SecurColombia</h1>
        <div class="volver">        <a href="../index.html">volver al inicio</a></div>

    </section>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <section id="cont-botones">
            <input type="submit" value="eliminar" name="eliminar">
            <input type="submit" value="editar" name="editar">
            <div class="dropdown">
                <button>agregar</button>
                <div class="dropdown-content">
                    <a href="RegistrarMoto.php" class="agregarMoto"><img src="../imagenes/bicicleta.png" alt="">moto</a>
                    <a href="RegistrarAuto.php" class="agregarAuto"><img src="../imagenes/seguro-de-auto.png" alt="">auto</a>
                </div>
            </div>
            <div class="dropdown">
                <button>Consultar</button>
                <div class="dropdown-content">
                    <input type="submit" value="moto" name="moto" class="moto">
                    <input type="submit" name="auto" value="auto" class="auto">
                </div>
            </div>
        </section>
    </form>

    <?php
    // Consultar
    $auto = "";
    $moto = "";
    echo $auto;
    $inc = include '../php/conexion.php';
    $consultaA = "SELECT * FROM registroautos";
    $visualA = $conexion->query($consultaA);
    $consultaM = "SELECT * FROM registromotos";
    $visualM = $conexion->query($consultaM);
    if (isset($_POST['moto'])) {
        $moto = $_POST['moto'];
    }
    if (isset($_POST['auto'])) {
        $auto = $_POST['auto'];
    }
    if ($moto) {
        if ($inc) {
            echo '
            <section id="contenedor-tablas">
                <div class="tabla">
                    <table class="moto">
                        <caption>motos</caption>
                        <tr>
                            <td>Nombre</td>
                            <td>id</td>
                            <td>placa</td>
                            <td>modelo</td>
                            <td>cilindraje</td>
                            <td>fecha compra</td>
                        </tr>
            ';
        }
        foreach ($visualM as $fila) { 
            echo '
                <tr>
                    <td>'.$fila['Nombre'].'</td>
                    <td>'.$fila['identificacion'].'</td>
                    <td>'.$fila['placa'].'</td>
                    <td>'.$fila['modelo'].'</td>
                    <td>'.$fila['cilindraje'].'</td>
                    <td>'.$fila['Fecha'].'</td>
                </tr>
            ';
        }
        echo '
                    </table>
                </div>
            </section>
        ';
    }
    if ($auto) {
        if ($inc) {
            echo '
            <section id="contenedor-tablas">
                <div class="tabla">
                    <table class="auto">
                        <caption>autos</caption>
                        <tr>
                            <td>Nombre</td>
                            <td>id</td>
                            <td>placa</td>
                            <td>modelo</td>
                            <td>cilindraje</td>
                            <td>fecha compra</td>
                        </tr>
            ';
        }
        foreach ($visualA as $fila) { 
            echo '
                <tr>
                    <td>'.$fila['Nombre'].'</td>
                    <td>'.$fila['identificacion'].'</td>
                    <td>'.$fila['placa'].'</td>
                    <td>'.$fila['modelo'].'</td>
                    <td>'.$fila['cilindraje'].'</td>
                    <td>'.$fila['Fecha'].'</td>
                </tr>
            ';
        }
        echo '
                    </table>
                </div>
            </section>
        ';
    }
    ?>

    <section id="editar">
        <div class="form-editar">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <?php
            if (isset($_POST['editar'])) {
                echo '
                    <label for="">para editar cualquier dato es necesario ingresar la identificacion y placa <strong>como se registro al momento de llenar el formulario.</strong></label><br>
                    <label for="">Identificacion.</label><br>
                    <input type="number" name="identificacion"><br>
                    <label for="">placa</label><br>
                    <input type="text" maxlength="6" minlength="6" name="placa" class="mayusculas"><br>
                    <label for="">que desea editar</label><br>
                    <select name="Select-edit">
                        <option value="identificacion" name="OPidentificacion">Identificacion</option>
                        <option value="placa" name="OPplaca">Placa</option>
                        <option value="cilindraje" name="OPcilindraje">Cilindraje</option>
                        <option value="nombre" name="OPnombre">Nombre</option>
                        <option value="modelo" name="OPmodelo">Modelo</option>
                    </select><br>
                    <input type="submit" value="editar" name="editar-valor">
                </form>
            </div>
            <div class="img-editar"></div>
            </section>';
            }
            if(isset($_POST['eliminar'])){
                
                ?>
                <section id="eliminar">
                <div class="form-eliminar">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <label for="">para eliminar cualquier dato es necesario ingresar la identificacion y placa <strong>como se registro al momento de llenar el formulario.</strong></label><br>
                    <label for="">Identificacion.</label><br>
                    <input type="number" name="id_delet" required><br>
                    <label for="">placa</label><br>
                    <input type="text" maxlength="6" minlength="6" name="placa_delet" required class="mayusculas"><br>
                    <input type="submit" value="eliminar" name="eliminar-valor">
                </form>
            </div>
            <div class="img-editar"></div>
            </section>
                <?php
            }
            ?>

    <?php
    if (isset($_POST['identificacion']) && isset($_POST['placa'])) {
        $consulta_id = $_POST['identificacion'];
        $consulta_placa = $_POST['placa'];
        $consultMoto =  "SELECT * FROM registromotos WHERE identificacion = '$consulta_id' AND placa = '$consulta_placa'";
        $consultauto = "SELECT * FROM registroautos WHERE identificacion = '$consulta_id' AND placa = '$consulta_placa'";
        $resultMoto = $conexion->query($consultMoto);
        $resultauto = $conexion->query($consultauto);
        if($resultauto->num_rows > 0 || $resultMoto->num_rows > 0){
           
            
        $OpEdit = $_POST['Select-edit'];
        switch ($OpEdit) {
            case 'identificacion':

                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                <?php
                echo '
                <section id="editar-identificacion">
                    
                        <label for="nueva-identificacion">Nueva Identificacion</label><br>
                        <input type="number" name="nueva-identificacion"><br>
                        <input type="hidden" name="old-identificacion" value="'.$consulta_id.'">
                        <input type="hidden" name="placa-editada" value="'.$consulta_placa.'">
                        <input type="submit" value="Guardar" name="guardar-identificacion">
                    </form>
                </section>
            ';
        
                break;
            case 'placa':
                echo '<section id="editar-placa">
                    
                <label for="nueva-placa">Nueva placa</label><br>
                <input type="text" maxlength="6" name="nueva-placa" class="mayusculas"><br>
                <input type="hidden" name="old-identificacion" value="'.$consulta_id.'">
                <input type="hidden" name="placa-editada" value="'.$consulta_placa.'">
                <input type="submit" value="Guardar" name="guardar-placa">
            </form>
        </section>';
                break;
            case 'nombre':
                echo '<section id="editar-Nombre">
                    
                <label for="nuevo-Nombre">Nueva nombre</label><br>
                <input type="text" name="nuevo-nombre"><br>
                <input type="hidden" name="old-identificacion" value="'.$consulta_id.'">
                <input type="hidden" name="placa-editada" value="'.$consulta_placa.'">
                <input type="submit" value="Guardar" name="guardar-nombre">
            </form>
        </section>';
                break;
            case 'cilindraje':
                echo '<section id="editar-cilindraje">
                    
                <label for="nuevo-cc">Nueva cc</label><br>
                <input type="number" name="nuevo-cc"><br>
                <input type="hidden" name="old-identificacion" value="'.$consulta_id.'">
                <input type="hidden" name="placa-editada" value="'.$consulta_placa.'">
                <input type="submit" value="Guardar" name="guardar-cc">
            </form>
        </section>';
                break;
            case 'modelo':
                echo '<section id="editar-modelo">
                    
                <label for="nuevo-modelo">Nueva modelo</label><br>
                <input type="number" name="nuevo-modelo"><br>
                <input type="hidden" name="old-identificacion" value="'.$consulta_id.'">
                <input type="hidden" name="placa-editada" value="'.$consulta_placa.'">
                <input type="submit" value="Guardar" name="guardar-modelo">
            </form>
        </section>';
                break;
        }
    }else{
        echo 'la identificacion no tiene la placa ingresada';
    }
    
    }
    if(isset($_POST['guardar-identificacion'])){
        $nueva_identificacion = $_POST['nueva-identificacion'];
        $old_identificacion = $_POST['old-identificacion'];
        $old_placa = $_POST['placa-editada'];
        mysqli_query($conexion,"UPDATE registroautos SET identificacion = '$nueva_identificacion' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        mysqli_query($conexion,"UPDATE registromotos SET identificacion = '$nueva_identificacion' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        echo 'La identificación '.$old_identificacion.' ha sido actualizada a '.$nueva_identificacion;
    }
    if(isset($_POST['guardar-placa'])){
        $Nueva_placa = $_POST['nueva-placa'];
        $old_identificacion = $_POST['old-identificacion'];
        $old_placa = $_POST['placa-editada'];
        mysqli_query($conexion,"UPDATE registroautos SET placa = '$Nueva_placa' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        mysqli_query($conexion,"UPDATE registromotos SET placa = '$Nueva_placa' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        echo 'La placa '.$old_placa.' ha sido actualizada a '.$Nueva_placa;
    }
    if(isset($_POST['guardar-nombre'])){
        $Nuevo_nombre = $_POST['nuevo-nombre'];
        $old_identificacion = $_POST['old-identificacion'];
        $old_placa = $_POST['placa-editada'];
        mysqli_query($conexion,"UPDATE registroautos SET nombre = '$Nuevo_nombre' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        mysqli_query($conexion,"UPDATE registromotos SET nombre = '$Nuevo_nombre' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        echo 'el nombre ha sido actualizada a '.$Nuevo_nombre;
    }
    if(isset($_POST['guardar-cc'])){
        $Nuevo_cc = $_POST['nuevo-cc'];
        $old_identificacion = $_POST['old-identificacion'];
        $old_placa = $_POST['placa-editada'];
        mysqli_query($conexion,"UPDATE registroautos SET cilindraje = '$Nuevo_cc' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        mysqli_query($conexion,"UPDATE registromotos SET cilindraje = '$Nuevo_cc' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        echo 'el cilindraje ha sido actualizada a '.$Nuevo_cc;
    }
    if(isset($_POST['guardar-modelo'])){
        $Nuevo_modelo = $_POST['nuevo-modelo'];
        $old_identificacion = $_POST['old-identificacion'];
        $old_placa = $_POST['placa-editada'];
        mysqli_query($conexion,"UPDATE registroautos SET modelo = '$Nuevo_modelo' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        mysqli_query($conexion,"UPDATE registromotos SET modelo = '$Nuevo_modelo' where identificacion = '$old_identificacion' AND placa = '$old_placa'");
        echo 'el cilindraje ha sido actualizada a '.$Nuevo_modelo;
    }
    if(isset($_POST['id_delet']) && isset($_POST['placa_delet'])){
        $id_delete = $_POST['id_delet'];
        $placa_delete = $_POST['placa_delet'];
        mysqli_query($conexion,"DELETE FROM registroautos where identificacion = '$id_delete' AND placa = '$placa_delete'");
        mysqli_query($conexion,"DELETE FROM registromotos where identificacion = '$id_delete' AND placa = '$placa_delete'");
        echo 'el usuario con la id '.$id_delete.' con el vehiculo de la palca '.$placa_delete.' a sido eliminado de la base de datos';
    }
    ?>
    
</body>
</html>