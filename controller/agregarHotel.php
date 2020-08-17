<?php

require_once '../model/data.php';

$nombre = $_POST["nombre"];
$estrellas = $_POST["estrellas"];
$ciudad = $_POST["ciudad"];
$descripcion = $_POST["descripcion"];
$token=$_POST["token"];


$d = new Data();

$d->newHotel($nombre, $estrellas,$ciudad,$descripcion,$token);

header("Location: ../hoteles.php?estado=true");

?>