<?php 
$usuario = "root";
$clave = "";
$servidor = "localhost";
$basededatos = "huerto";
//creacion de la conexio0n de la base de datos con mysql_connect
$conexion=mysqli_connect($servidor, $usuario, $clave) or die ("no se ha pdido conectar al servidor");
//selecion de la ase de datos a utilizar
$db = mysqli_select_db($conexion, $basededatos) or die ("no se ha podido conectar a la base de datos");
//seleccion del a base de datos
$consulta = "SELECT * FROM sensor_suelo JOIN sensor_luminosidad JOIN sensor_distancia 
JOIN sensor_dht11 LIMIT 11 ";
//resultado con la respuesta a la consulta
$resultado =mysqli_query($conexion, $consulta) or die ("error al consultar");
$sensores = array();
$sensor = array();



while($columna = mysqli_fetch_array($resultado)){
  $sensor["id_sensor_suelo"] = $columna ['id_sensor_suelo'];
  $sensor["valor_humedad_suelo"] = $columna ['valor_humedad_suelo'];
  $sensor["fecha_medicion"] = $columna ['fecha_medicion'];
  $sensor["hora_medicion"] = $columna ['hora_medicion'];
  $sensor["id_sensor_luminosidad"] = $columna ['id_sensor_luminosidad'];
  $sensor["valor_luminosidad"] = $columna ['valor_luminosidad'];
  $sensor["fecha_medicion"] = $columna ['fecha_medicion'];
  $sensor["hora_medicion"] = $columna ['hora_medicion'];
  $sensor["id_sensor_distancia"] = $columna ['id_sensor_distancia'];
  $sensor["valor_profundidad"] = $columna ['valor_profundidad'];
  $sensor["fecha_medicion"] = $columna ['fecha_medicion'];
  $sensor["hora_medicion"] = $columna ['hora_medicion'];
  $sensor["id_sensor_dht11"] = $columna ['id_sensor_dht11'];
  $sensor["dht11_humedad"] = $columna ['dht11_humedad'];
  $sensor["dht11_temperatura"] = $columna ['dht11_temperatura'];
  $sensor["fecha_medicion"] = $columna ['fecha_medicion'];
  $sensor["hora_medicion"] = $columna ['hora_medicion'];
  array_push($sensores, $sensor);
}

while($columna=mysqli_fetch_array($resultado)){                                          

}       
 ?> 
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title></title>
  </head>
  <div class="container">
  <div class="row">
    <div class="col-md-6">
          <h3>Humedad en suelo</h3>
          <h6>Valores identificados en base a %</h6>
    </div>
    <div class="col-md-6">
        <h4>Humedad y Temperatura Ambiente</h4>
        <h6>Valores medidos en % y en ºC</h6>
  </div>
  </div>
  </div>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
          <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded" >
            <tr>
              <td>cantidad</td>
              <td>id </td>
              <td>% Humedad </td>              
              <td>Fecha</td>
              <td>Hora </td>
            </tr>
            <?php
            for ($i=0; $i < count($sensores); $i++) {
             
              ?>
              <tr>
              <td><?php echo $i; ?></td>
                <td><?php echo $sensores[$i]["id_sensor_suelo"]; ?> </td>
                <td><?php echo $sensores[$i]["valor_humedad_suelo"];?> </td>
                <td><?php echo $sensores[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores[$i]["hora_medicion"];?> </td>
              </tr>
              <?php
              
            }
            ?>
          </table>
        </div>
        <!-- COSTADO DERECHO ARRIBA-->
        <div class="col-md-4">
          <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
            <tr>
              <td>cantidad</td>
              <td>id </td>              
              <td>% Humedad </td>
              <td>T. ºC</td>
              <td>Fecha</td>
              <td>Hora </td>
            </tr>
            <?php
            for ($i=0; $i < count($sensores); $i++) {               
              if ($sensores[$i]["id_sensor_dht11"] > 0) {
              ?>
              <tr>
                <td><?php echo $i; ?></td>                
                <td><?php echo $sensores[$i]["id_sensor_dht11"]; ?> </td>
                <td><?php echo $sensores[$i]["dht11_humedad"];?> </td>
                <td><?php echo $sensores[$i]["dht11_temperatura"];?> </td>
                <td><?php echo $sensores[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores[$i]["hora_medicion"];?> </td>
              </tr>
              <?php              
            }
          }
            ?>
          </table>
          <!-- FIN COSTADO DERECHO.-->
          <h4>Luminosidad</h4>
          <h6>Valor medido en lux</h6>
          <table class="table table-hover table-bordered ">
            <tr>
              <td>cantidad</td>
              <td>id </td>
              <td>Fecha </td>
              <td>Hora </td>
              <td>Lux</td>
            </tr>
            <?php
            for ($i=0; $i < count($sensores); $i++) {
               if ($sensores[$i]["id_sensor_luminosidad"] > 0) {
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $sensores[$i]["id_sensor_luminosidad"]; ?> </td>
                <td><?php echo $sensores[$i]["valor_luminosidad"];?> </td>
                <td><?php echo $sensores[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores[$i]["hora_medicion"];?> </td>
              </tr>
              <?php
              }
            }
            ?>
          </table>
          <h4>Valor de llenado estanque</h4>
          <h6>Valor medido en Cms.</h6>
          <table class="table table-hover table-bordered ">
            <tr>
              <td>cantidad</td>
              <td>id</td>
              <td>Fecha </td>
              <td>Hora </td>
              <td>Distancia (Cms)</td>
            </tr>
            <?php
            for ($i=0; $i < count($sensores); $i++) {
               if ($sensores[$i]["id_sensor_suelo"] > 0 ) {
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $sensores[$i]["id_sensor_suelo"]; ?> </td>
                <td><?php echo $sensores[$i]["valor_humedad_suelo"];?> </td>
                <td><?php echo $sensores[$i]["fecha_medicion"]; ?> </td>
                <td><?php echo $sensores[$i]["hora_medicion"];?> </td>
              </tr>
              <?php
              }
            }
            ?>
          </table>
        </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>