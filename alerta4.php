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
$consulta4 = "SELECT * FROM sensor_temperatura
WHERE valor_temperatura_ambiente >=24 and valor_temperatura_ambiente <25";

//resultado con la respuesta a la consulta
$resultado4 = mysqli_query($conexion, $consulta4) or die ("error al consultar");
$sensor_temperatura = array();
$sensores4 = array();
 //while sensor temperatura
 while($columna = mysqli_fetch_array($resultado4)){                                          
    $sensor_temperatura["id"] = $columna['id'];
    $sensor_temperatura["valor_temperatura_ambiente"] = $columna['valor_temperatura_ambiente'];
    $sensor_temperatura["fecha_medicion"] = $columna['fecha_medicion'];
    $sensor_temperatura["hora_medicion"] = $columna['hora_medicion'];
    array_push($sensores4, $sensor_temperatura);
  }
?> 
<!DOCTYPE html>
<html lang = "es" dir = "ltr">
  <head>
  <meta http-equiv="Refresh" content="10;url=http://localhost/Invernadero/alerta4.php">
    <meta charset = "utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title></title>
  </head>

  <div class = "col-md-6">
  <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
        <h4>Temperatura Ambiente</h4>
        <h6>Valores medidos en % y en ºC</h6>
  </div>
         
  <tr bgcolor="yellow">
              <td>cantidad</td>
              <td>id </td>              
              
              <td>T. ºC</td>
              <td>Fecha</td>
              <td>Hora </td>
              <a href="dashboard.php">Volver a las tablas</a>
            </tr>
            <?php
            for ($i = 0; $i < count($sensores4); $i++) {               
             
              ?>
              <tr>
                <td><?php echo $i+1; ?></td>                
                <td><?php echo $sensores4[$i]["id"]; ?> </td>
                <td><?php echo $sensores4[$i]["valor_temperatura_ambiente"];?> </td>
                <td><?php echo $sensores4[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores4[$i]["hora_medicion"];?> </td>
              </tr>
              <?php              
            
          }
            ?>
          </table>
        
      </div>
    </div>
  </body>
</html>