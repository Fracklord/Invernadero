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
$consulta1 = "SELECT * FROM sensor_distancia   order by id desc LIMIT 2  ";
$consulta2 = "SELECT * FROM  sensor_luminosidad ORDER BY id desc  LIMIT 2 " ; 
$consulta3 = "SELECT * FROM sensor_suelo order by id desc LIMIT 13  ";
$consulta4 = "SELECT * FROM sensor_temperatura order by id desc LIMIT 2 ";

//resultado con la respuesta a la consulta
$resultado1 = mysqli_query($conexion, $consulta1) or die ("error al consultar");
$resultado2 = mysqli_query($conexion, $consulta2) or die ("error al consultar");
$resultado3 = mysqli_query($conexion, $consulta3) or die ("error al consultar");
$resultado4 = mysqli_query($conexion, $consulta4) or die ("error al consultar");
$sensor_distancia = array();
$sensor_luminosidad = array();
$sensor_suelo = array();
$sensor_temperatura = array();
$sensores1 = array();
$sensores2 = array();
$sensores3 = array();
$sensores4 = array();
//while sensor distancia
while($columna = mysqli_fetch_array($resultado1)){
  $sensor_distancia["id"] = $columna['id'];
  $sensor_distancia["valor_distancia_agua"] = $columna['valor_distancia_agua'];
  $sensor_distancia["fecha_medicion"] = $columna['fecha_medicion'];
  $sensor_distancia["hora_medicion"] = $columna['hora_medicion'];


  array_push($sensores1, $sensor_distancia);
}

//while sensor luminosidad
while($columna = mysqli_fetch_array($resultado2)){                                              
  $sensor_luminosidad["id"] = $columna['id'];
  $sensor_luminosidad["valor_luminosidad_ambiente"] = $columna['valor_luminosidad_ambiente'];
  $sensor_luminosidad["fecha_medicion"] = $columna['fecha_medicion'];
  $sensor_luminosidad["hora_medicion"] = $columna['hora_medicion'];

  array_push($sensores2, $sensor_luminosidad);
}
//while sensor suelo 
while($columna = mysqli_fetch_array($resultado3)){
  $sensor_suelo["id"] = $columna ['id'];
  $sensor_suelo["valor_humedad_suelo"] = $columna['valor_humedad_suelo'];
  $sensor_suelo["fecha_medicion"] = $columna['fecha_medicion'];
  $sensor_suelo["hora_medicion"] = $columna ['hora_medicion'];
 
  array_push($sensores3, $sensor_suelo);
}
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
  <meta http-equiv="Refresh" content="10;url=http://localhost/Invernadero/dashboard.php">
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
    <div class = "col-md-6">
        <h4>Temperatura Ambiente</h4>
        <h6>Valores medidos en % y en ºC</h6>
  </div>
  </div>
  </div>
  <body>
    <div class = "container">
    <div class = "row">
        <div class = "col-md-6">
          <table class = "table table-hover table-bordered shadow p-3 mb-5 bg-white rounded" >
            <tr>
              <td>cantidad</td>
              <td>id </td>
              <td>% Humedad </td>              
              <td>Fecha</td>
              <td>Hora </td>
              <a href="intentotabla1.php">Tabla completa</a> &nbsp &nbsp &nbsp <a href="alerta1.php">alertas</a> 
              &nbsp &nbsp &nbsp <a href="alarma1.php">Alarmas</a> 
             
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
            
          </table>
        </div>
        <!-- COSTADO DERECHO ARRIBA-->
        <div class="col-md-5">
          <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
            <tr>
              <td>cantidad</td>
              <td>id </td>                           
              <td>T. ºC</td>
              <td>Fecha</td>
              <td>Hora </td>
              <a href="intentotabla4.php ">Tabla completa</a> &nbsp &nbsp &nbsp <a href="alerta4.php">alertas</a> 
              &nbsp &nbsp &nbsp <a href="alarma4.php">Alarmas</a> 
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
          
          <!-- FIN COSTADO DERECHO.-->
          <h4>Luminosidad</h4>
          <h6>Valor medido en lux</h6>
          <table class="table table-hover table-bordered ">
            <tr>
              <td>cantidad</td>
              <td>id </td>
              <td>Lux</td>
              <td>Fecha </td>
              <td>Hora </td>
              <a href="intentotabla3.php">Tabla completa</a> &nbsp &nbsp &nbsp <a href="alerta3.php">alertas</a> 
              &nbsp &nbsp &nbsp <a href="alarma3.php">Alarmas</a> 
              
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
          <h4>Valor de llenado estanque</h4>
          <h6>Valor medido en Cms.</h6>
          <table class="table table-hover table-bordered ">
            <tr>
              <td>cantidad</td>
              <td>id</td>
              <td>Distancia (Cms)</td>
              <td>Hora </td>
              <td>Fecha </td>
              <a href="intentotabla2.php">Tabla completa</a> &nbsp &nbsp &nbsp <a href="alerta2.php">alertas</a> 
              &nbsp &nbsp &nbsp <a href="alarma2.php">Alarmas</a>
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
        </div>
      </div>
    </div>
  </body>
</html>