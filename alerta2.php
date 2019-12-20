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
$consulta1 = "SELECT * FROM `sensor_distancia`
WHERE valor_distancia_agua >25 and valor_distancia_agua < 29";

//resultado con la respuesta a la consulta
$resultado1 = mysqli_query($conexion, $consulta1) or die ("error al consultar");
$sensor_distancia = array();
$sensores1 = array();
//while sensor distancia
while($columna = mysqli_fetch_array($resultado1)){
    $sensor_distancia["id"] = $columna['id'];
    $sensor_distancia["valor_distancia_agua"] = $columna['valor_distancia_agua'];
    $sensor_distancia["fecha_medicion"] = $columna['fecha_medicion'];
    $sensor_distancia["hora_medicion"] = $columna['hora_medicion'];
  
  
    array_push($sensores1, $sensor_distancia);
  }
?> 
<!DOCTYPE html>
<html lang = "es" dir = "ltr">
  <head>
  <meta http-equiv="Refresh" content="10;url=http://localhost/Invernadero/alerta2.php">
    <meta charset = "utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <div class = "col-md-6">
  <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
 
    <title></title>
  </head>
  <div class = "container">
  <div class = "row">
  
  <h4>Valor de llenado estanque</h4>
          <h6>Valor medido en Cms.</h6>
          <table class="table table-hover table-bordered ">
          <tr bgcolor="yellow">
            
              <td>cantidad</td>
              <td>id</td>
              <td>Distancia (Cms)</td>
              <td>Hora </td>
              <td>Fecha </td>
              <a href="dashboard.php">Volver a las tablas</a>
            </tr>
            <?php
            for ($i = 0; $i < count($sensores1); $i++) {
               
              ?>
              <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $sensores1[$i]["id"]; ?> </td>
                <td><?php echo $sensores1[$i]["valor_distancia_agua"];?> </td>
                <td><?php echo $sensores1[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores1[$i]["hora_medicion"];?> </td>
              </tr>
              <?php
              
            }
            ?>
          </table>
        
      </div>
    </div>
  </body>
</html>