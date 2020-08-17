<?php
require_once '../model/data.php';

$id = $_POST["id"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

$d = new Data();

$d->actualizar_usuario($id, $usuario, $password);

header("Location: ../");

?>