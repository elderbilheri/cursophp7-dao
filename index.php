<?php 

require_once("config.php");

$usuario = new User();

$usuario->loadById(4);

echo $usuario;

?>