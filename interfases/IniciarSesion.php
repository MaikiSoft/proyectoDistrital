<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilosSesion.css?=<?php echo(rand()); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="cont-titulo">
    <h1 class="titulo"> ingresa tus datos</h1>
    </div>
    <section id="seccion-form">
    
    <div class="contenedor-form">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="formulario">
        
        <label for="">Identificacion</label><br>
        <input type="number" name="idC"><br>
        <br>
        <label for="">Placa</label><br>
        <input type="text" maxlength="6" name="placaC"><br>
        
        <input type="submit" name="boton" value="consultar" class="boton">
    </form>
    
    </div>
    <div class="cont-imagen"><img src="../imagenes/ImagenSesion.png" alt="" class="imagen"></div>
    </section>
    <div class="boton-atras">
            <a href="../index.html" class="atras"> <img src="../imagenes/inicio.png" alt="" srcset=""> </a></div>
    <?php
    if (isset($_POST['placaC']) && isset($_POST['idC'])) {
        $inc = include("../php/conexion.php");
        $consulta_id = $_POST['idC'];
        $consulta_placa = $_POST['placaC'];
        $consultMoto =  "SELECT * FROM registromotos WHERE identificacion = '$consulta_id' AND placa = '$consulta_placa'";
        $consultauto = "SELECT * FROM registroautos WHERE identificacion = '$consulta_id' AND placa = '$consulta_placa'";
        $resultMoto = $conexion->query($consultMoto);
        $resultauto = $conexion->query($consultauto);
        if($resultauto->num_rows > 0 || $resultMoto->num_rows > 0){
            echo'<section id="contenedor-tablas">
    <div class="tabla"><table class="moto">
    <caption>todos los registros con la identificacion '.$consulta_id.' y la placa '.$consulta_placa.'</caption>
    <caption>motos</caption>
    <tr>
        <td>Nombre</td>
        <td>id</td>
        <td>placa</td>
        <td>modelo</td>
        <td>cilindraje</td>
        <td>fecha compra</td>

    </tr>';
foreach($resultauto as $fila){ 
        echo '
        <tr>
            <td> '.$fila['Nombre'].' </td>
            <td>'.$fila['identificacion'].'</td>
            <td>'.$fila['placa'].'</td>
            <td> '.$fila['modelo'].'</td>
            <td>'.$fila['cilindraje'].'</td>
            <td>'.$fila['Fecha'].'</td>
            
        </tr>
    ';
    
}
echo'<section id="contenedor-tablas">
<div class="tabla"><table class="auto">
<caption>autos</caption>
<tr>
    <td>Nombre</td>
    <td>id</td>
    <td>placa</td>
    <td>modelo</td>
    <td>cilindraje</td>
    <td>fecha compra</td>

</tr>';
foreach($resultMoto as $fila){ 
    echo '
    <tr>
        <td> '.$fila['Nombre'].' </td>
        <td>'.$fila['identificacion'].'</td>
        <td>'.$fila['placa'].'</td>
        <td> '.$fila['modelo'].'</td>
        <td>'.$fila['cilindraje'].'</td>
        <td>'.$fila['Fecha'].'</td>
        
    </tr>
';

}        
        
    }else{
        echo 'si no te aparece nada es por que no estas registrado';
    }
    
    }
if(isset($_POST['idC']) && empty($_POST['placaC'])){ 
    $Consulta_id = $_POST['idC'];
    $inc = include("../php/conexion.php");
    if($inc){
        $consultMoto =  "SELECT * FROM registromotos WHERE identificacion = '$consulta_id'";
        $consultauto = "SELECT * FROM registroautos WHERE identificacion = '$consulta_id' ";
        $resultMoto = $conexion->query($consultMoto);
        $resultauto = $conexion->query($consultauto);

if(isset($Consulta_id)) {
    echo'<section id="contenedor-tablas">
    <div class="tabla"><table class="moto">
    <caption>todos los registros con la identificacion '.$Consulta_id.'</caption>
    <caption>motos</caption>
    <tr>
        <td>Nombre</td>
        <td>id</td>
        <td>placa</td>
        <td>modelo</td>
        <td>cilindraje</td>
        <td>fecha compra</td>

    </tr>';
}
foreach($resultMoto as $fila){ 
        echo '
        <tr>
            <td> '.$fila['Nombre'].' </td>
            <td>'.$fila['identificacion'].'</td>
            <td>'.$fila['placa'].'</td>
            <td> '.$fila['modelo'].'</td>
            <td>'.$fila['cilindraje'].'</td>
            <td>'.$fila['Fecha'].'</td>
            
        </tr>
    ';
    
}
echo '</table>
</div>
</section>';
if(isset($Consulta_id)){
    echo '<section id="contenedor-tablas">
    <div class="tabla"><table class="auto">
    <caption>autos</caption>
    <tr>
        <td>Nombre</td>
        <td>id</td>
        <td>placa</td>
        <td>modelo</td>
        <td>cilindraje</td>
        <td>fecha compra</td>
    </tr>';}
    foreach($resultauto as $fila){ 
        
        echo '
        <tr>
        <td> '.$fila['Nombre'].' </td>
        <td>'.$fila['identificacion'].'</td>
        <td>'.$fila['placa'].'</td>
        <td> '.$fila['modelo'].'</td>
        <td>'.$fila['cilindraje'].'</td>
        <td>'.$fila['Fecha'].'</td>
        </tr>
        

        ';
        }
        echo '</table></div>
        </section>';

}
}

    ?>
</body>
</html>