<?php 
require_once '../model/data.php';
$d = new Data();
 $id = $_POST ["id"];

$d->deleteHotel($id);

header ("Location: ../hoteles.php");
?>