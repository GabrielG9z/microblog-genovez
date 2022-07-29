<?php
use Microblog\ControleDeAcesso;


require_once '../vendor/autoload.php';

$sessao = new ControleDeAcesso;
$sessao->verificaAcessoAdmin();
$sessao->verificaAcesso();

//Criamos um objeto para poder acessar os recursos da classe,  
