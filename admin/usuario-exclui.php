<?php

use Microblog\ControleDeAcesso;
use Microblog\Usuario;

require_once '../vendor/autoload.php';

$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();

//Criamos um objeto para poder acessar os recursos da classe,  
$usuario = new Usuario;

//obtemos o ID da URL primeiramente e passamos para o setter,
$usuario->setId($_GET['id']);

//só então executamos a exclusão
$usuario->excluir();

//Após excluir, redirecionamos para a página de lista de usuários.
header("location:usuarios.php");