<?php
date_default_timezone_set("America/Santiago");

$fecha_medicion = date('Y-m-d');
$hora_medicion = date('H:i:s');
$valor_humedad_suelo = $_GET['varCap'];
$valor_temperatura_ambiente = $_GET['sensorDS18B20'];
$valor_luminosidad_ambiente = $_GET['varLDR'];
$valor_distancia_agua = $_GET['d'];


$conexion = mysqli_connect('localhost','root','','huerto') or die ("No se ha podido conectar al servidor de BD");

if(isset($valor_humedad_suelo)){
    $sql = "INSERT INTO sensor_suelo(valor_humedad_suelo, fecha_medicion, hora_medicion)VALUES('".$valor_humedad_suelo."', '".$fecha_medicion."', '".$hora_medicion."')";
    $res = mysqli_query($conexion, $sql);
}
if(isset($valor_temperatura_ambiente)){
    $sql = "INSERT INTO sensor_temperatura(valor_temperatura_ambiente, fecha_medicion, hora_medicion)VALUES('".$valor_temperatura_ambiente."', '".$fecha_medicion."', '".$hora_medicion."')";
    $res = mysqli_query($conexion, $sql);
}
if(isset($valor_luminosidad_ambiente)){
    $sql = "INSERT INTO sensor_luminosidad(valor_luminosidad_ambiente, fecha_medicion, hora_medicion)VALUES('".$valor_luminosidad_ambiente."', '".$fecha_medicion."', '".$hora_medicion."')";
    $res = mysqli_query($conexion, $sql);
}
if(isset($valor_distancia_agua)){
    $sql = "INSERT INTO sensor_distancia(valor_distancia_agua, fecha_medicion, hora_medicion)VALUES('".$valor_distancia_agua."', '".$fecha_medicion."', '".$hora_medicion."')";
    $res = mysqli_query($conexion, $sql);
}

//LA SIGUIENTE INSTRUCCIÓN PUEDE NO SER NECESARIA

echo $sql;
?>