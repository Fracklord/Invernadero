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
$consulta2 = "SELECT * FROM `sensor_luminosidad` WHERE valor_luminosidad_ambiente >= 200" ; 

//resultado con la respuesta a la consulta
$resultado2 = mysqli_query($conexion, $consulta2) or die ("error al consultar");
$sensor_luminosidad = array();
$sensores2 = array();
//while sensor luminosidad
while($columna = mysqli_fetch_array($resultado2)){                                              
    $sensor_luminosidad["id"] = $columna['id'];
    $sensor_luminosidad["valor_luminosidad_ambiente"] = $columna['valor_luminosidad_ambiente'];
    $sensor_luminosidad["fecha_medicion"] = $columna['fecha_medicion'];
    $sensor_luminosidad["hora_medicion"] = $columna['hora_medicion'];
  
    array_push($sensores2, $sensor_luminosidad);
  }
?> 
<!DOCTYPE html>
<html lang = "es" dir = "ltr">
  <head>
  <meta http-equiv="Refresh" content="10;url=http://localhost/Invernadero/alarma3.php">
    <meta charset = "utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <div class = "col-md-6">
  <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
    <title></title>
  </head>
  <h4>Luminosidad</h4>
          <h6>Valor medido en lux</h6>
          <table class="table table-hover table-bordered ">
          <tr bgcolor="red">
              <td>cantidad</td>
              <td>id </td>
              <td>Lux</td>
              <td>Fecha </td>
              <td>Hora </td>
              <a href="dashboard.php">Volver a las tablas</a>
              
            </tr>
            <?php
            for ($i = 0; $i < count($sensores2); $i++) {
             
              ?>
              <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $sensores2[$i]["id"]; ?> </td>
                <td><?php echo $sensores2[$i]["valor_luminosidad_ambiente"];?> </td>
                <td><?php echo $sensores2[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores2[$i]["hora_medicion"];?> </td>
              </tr>
              <?php
              
            }
            ?>
          </table>
        
      </div>
    </div>
  </body>
</html>