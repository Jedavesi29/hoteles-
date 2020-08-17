<?php
session_start();
require_once '../model/data.php';
$d = new Data();

$user = $_POST["username"];
$password = $_POST["password"];
$token = bin2hex(random_bytes(12));

$passwordCifrada = password_hash($password, PASSWORD_DEFAULT, array("cost"=>15));

$log = $d->login($user, $password, $token);

if (isset($log) && !is_null($log)) {
	header("Location: ../index.php?acc=bienvenido");
} else {
	header("Location: ../index.php?acc=incorrecto");
}
?>