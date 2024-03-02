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

// $autenticado = new User();

// $autenticado->authentication("elder.bilheri", "1234@");

// echo $autenticado;


// ------------------------------------------

$usuario = new User();

$usuario->setNome("Rosa Medianeira");
$usuario->setLogin("rosa.medianeira");
$usuario->setSenha("rosa123");
$usuario->setEmail("rosa_medianeira@email.com");
$usuario->setDataNascimento("1968-09-16");
$usuario->setGenero("Feminino");
$usuario->setDocumento("021.016.081-16");
$usuario->setEndereco("Rua Sepé Tiaraju, 392");

$usuario->insert();

echo  $usuario;
?>
