<?php 
$usuario = "root";
$clave = "";
$servidor = "localhost";
$basededatos = "huerto";
//creacion de la conexio0n de la base de datos con mysql_connect
$conexion = mysqli_connect($servidor, $usuario, $clave) or die ("no se ha pdido conectar al servidor");
//selecion de la ase de datos a utilizar
$db = mysqli_select_db($conexion, $basededatos) or die ("no se ha podido conectar a la base de datos");
//seleccion del a base de datos

$consulta3 = "SELECT * FROM `sensor_suelo` WHERE valor_humedad_suelo >= 560 ";


//resultado con la respuesta a la consulta
$resultado3 = mysqli_query($conexion, $consulta3) or die ("error al consultar");
$sensor_suelo = array();
$sensores3 = array();




//while sensor suelo 
while($columna = mysqli_fetch_array($resultado3)){
  $sensor_suelo["id"] = $columna ['id'];
  $sensor_suelo["valor_humedad_suelo"] = $columna['valor_humedad_suelo'];
  $sensor_suelo["fecha_medicion"] = $columna['fecha_medicion'];
  $sensor_suelo["hora_medicion"] = $columna ['hora_medicion'];
 
  array_push($sensores3, $sensor_suelo);
}




      
 
 ?> 
<!DOCTYPE html>
<html lang = "es" dir = "ltr">
  <head>
  <meta http-equiv="Refresh" content="10;url=http://localhost/Invernadero/alarma1.php">
    <meta charset = "utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title></title>
  </head>
  <div class = "container">
  <div class = "row">
    <div class = "col-md-6">
          <h3>Humedad en suelo</h3>
          <h6>Valores identificados en base a %</h6>
    </div>
  
  </div>
  </div>
  <body>
    <div class = "container">
    <div class = "row">
        <div class = "col-md-6">
          <table class = "table table-hover table-bordered shadow p-3 mb-5 bg-white rounded" >
          <tr bgcolor="red">
            
              <td>cantidad</td>
              <td>id </td>
              <td>% Humedad </td>              
              <td>Fecha</td>
              <td>Hora </td>
              <a href="dashboard.php">Volver a las tablas</a>
            </tr>
            <?php
            for ($i = 0; $i < count($sensores3); $i++) {             
              ?>
              
              <tr>
              
                <td>
                <?php
                $cantidad1 = $i;
                $cantidad1 = $cantidad1 + 1;   
                echo $cantidad1; 
                ?>
                </td>
                <td><?php echo $sensores3[$i]["id"]; ?> </td>
                <td><?php echo $sensores3[$i]["valor_humedad_suelo"];?> </td>
                <td><?php echo $sensores3[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores3[$i]["hora_medicion"];?> </td>               
              </tr>
              <?php           
            }
            ?>
            
        