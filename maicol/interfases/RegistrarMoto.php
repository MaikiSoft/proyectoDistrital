<?php
 include '../php/conexion.php';

 $query = mysqli_query($conexion, "SELECT * FROM registromotos");
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estiloRegistroMoto.css?=<?php echo(rand()); ?>">
    <title>Document</title>
</head>

<body>
    <div class="imagen"> <img src="../imagenes/ImagenRegistrarMoto.png" alt="" srcset=""></div>
    <section id="cont-titulo">
        <div class="titulo">

            <h1>Registrar Moto</h1>
        </div>
    </section>
    <section id="cont-formulario">
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="formulario">
            <label for="">Nombre:</label><br>
            <input type="text" name="Nombre" required><br>
            <hr>
            <label>Identificacion</label><br>
            <input type="number" name="id" required><br>
            <hr>
            <label for="">email</label><br>
            <input type="email" name="email" required><br>
            <hr>
            <label for="">cilindraje del vehiculo</label><br>
            <input type="number" name="CC" required><br>
            <hr>
            <label for="">Placa</label><br>
            <input type="text" maxlength="6" minlength="6"  name="placa" required class="mayusculas"><br>
            <hr>
            <label for="">modelo</label><br>
            <input type="number" name="modelo" required><br>
            <hr>
            <label>Aceptar Terminos Y condiciones</label>
            <input type="checkbox" name="terminos" class="palomita" required>
            <br>
            <input type="submit" value="enviar" class="boton" name="enviar">
        </form>
    </section>
    <div class="boton-atras">
            <a href="../index.html" class="atras"> <img src="../imagenes/inicio.png" alt="" srcset=""> </a></div>
    <?php
    if(isset($_POST['placa']) && isset($_POST['Nombre'])){ 
    
    $Placa = $_POST['placa'];
    $validar = substr($Placa,-1);
    if(is_numeric($validar)){
        echo '<h1>por favor revise su placa</h1>';
        }else{
            $Nombre = $_POST['Nombre'];
            $Id = $_POST['id'];
            $email = $_POST['email'];
            $cilindraje = $_POST['CC'];
            $modelo = $_POST['modelo'];
            $consultMoto = $conexion->query( "SELECT EXISTS(SELECT * FROM registromotos WHERE  placa = '$Placa');");
            $row=mysqli_fetch_row($consultMoto);
            if($row[0]=="1"){
            echo 'el dato ya existe';
        }else{
            mysqli_query($conexion,"INSERT INTO registromotos (Nombre,identificacion,placa,modelo,cilindraje) 
            VALUES (UPPER('$Nombre'), UPPER('$Id'), UPPER('$Placa'), UPPER('$modelo'), UPPER('$cilindraje'))" );
            $consultMoto =  "SELECT * FROM registromotos WHERE identificacion = '$Id' AND placa = '$Placa'";
            $visualMoto = $conexion->query($consultMoto);
            echo '
            <section id="contenedor-tablas">
            <h1>se a guardado con exito</h1>
            <div class="tabla">
                <table class="Datos del cliente">
                    <caption>motos</caption>
                    <tr>
                        <td>Nombre</td>
                        <td>id</td>
                        <td>placa</td>
                        <td>modelo</td>
                        <td>cilindraje</td>
                        <td>fecha compra</td>
                    </tr>';
                    foreach($visualMoto as $fila){
                    echo '<tr>
                    <td>'.$fila['Nombre'].'</td>
                    <td>'.$fila['identificacion'].'</td>
                    <td>'.$fila['placa'].'</td>
                    <td>'.$fila['modelo'].'</td>
                    <td>'.$fila['cilindraje'].'</td>
                    <td>'.$fila['Fecha'].'</td>
                </tr>';
            }
                echo '</table>
                </div>
            
            <h1>si quiere cambiar algun dato tiene 24 horas apartir de ahora para hacerlo, de lo contrario sus datos quedaran tal y como se muestra en la tabla, para cambiar algun dato llame a nuestra linea de atencion.</h1>
            <div class="boton-salida">
            <a href="../index.html" class="salida"> Continuar </a></div>
            </section>';
        }
    }
}
    ?>
</body>

</html>