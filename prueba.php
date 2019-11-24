<?php
date_default_timezone_set("America/Santiago");

$fecha_medicion = date('Y-m-d');
$hora_medicion = date('H:i:s');
$valor_humedad_suelo = $_GET['valor_humedad_suelo'];

$conexion = mysqli_connect('localhost','root','Mirthayjuan1','vivero');

$sql = "INSERT INTO sensor_suelo(valor_humedad_suelo, fecha_medicion, hora_medicion)VALUES('".$valor_humedad_suelo."', '".$fecha_medicion."', '".$hora_medicion."')";

$res = mysqli_query($conexion, $sql);
echo $sql
?>