<?php

require_once("config.php");

// Carrega um usuário
// $usuario = new User();
// $usuario->loadById(4);
// echo $usuario;

// ------------------------------------------


// Carrega uma lista
// $lista = User::getList();

// echo json_encode($lista);

// ------------------------------------------


// Carrega uma lista de usuários buscando pelo nome
// $busca = User::search("bilheri");

// echo json_encode($busca);


// ------------------------------------------

// Carrega usuário autenticado

$autenticado = new User();

$autenticado->authentication("elder.bilheri", "1234@");

echo $autenticado;
