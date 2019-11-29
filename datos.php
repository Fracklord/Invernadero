<?php
date_default_timezone_set("America/Santiago");

$fecha_medicion = date('Y-m-d');
$hora_medicion = date('H:i:s');
$valor_humedad_suelo = $_GET['valor_humedad_suelo'];

$conexion = mysqli_connect('localhost','root','','vivero');

if(isset($valor_humedad_suelo)){
    $sql = "INSERT INTO sensor_suelo(valor_humedad_suelo, fecha_medicion, hora_medicion)VALUES('".$valor_humedad_suelo."', '".$fecha_medicion."', '".$hora_medicion."')";
}

//LA SIGUIENTE INSTRUCCIÓN PUEDE NO SER NECESARIA
//$res = mysqli_query($conexion, $sql);
echo $sql
?>