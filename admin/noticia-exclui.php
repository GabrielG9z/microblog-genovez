<?php 
use Microblog\ControleDeAcesso;
use Microblog\Usuario;

require_once '../vendor/autoload.php';

$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();

//Criamos um objeto para poder acessar os recursos da classe,  
$usuario = new Usuario;