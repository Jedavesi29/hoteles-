<?php
require_once '../model/data.php';

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$d = new Data();

$d->insert_usuario($usuario, $password);

header("Location: ../");

?>