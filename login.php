<?php

use Microblog\Usuario;
use Microblog\Utilitarios;

require_once "inc/cabecalho.php";

/* Mensagens de feedback relacionadosao acesso */
if(isset($_GET['acesso_proibido']) ){
	$feedback= '<i class="bi bi-person-x"></i> Você deve logar primeiro! ';
} elseif(isset($_GET['campos_obrigatorios']) ){
	$feedback = 'Você deve preencher os dois campos <i class="bi bi-exclamation-lg"></i>';
} elseif(isset($_GET['nao_encontrado']) ){
	$feedback = 'Usuário não encontrado <i class="bi bi-exclamation-lg"></i>';
}
?>


<div class="row">
    <div class="bg-white rounded shadow col-12 my-1 py-4">
        <h2 class="text-center fw-light">Acesso à área administrativa</h2>

        <form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50">

                <?php if(isset($feedback)){?>
				<p class="my-2 alert alert-warning text-center">
					<?=$feedback?>
				</p>
                <?php } ?>

				<div class="mb-3">
					<label for="email" class="form-label">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email">
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha:</label>
					<input class="form-control" type="password" id="senha" name="senha">
				</div>

				<button class="btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

			</form>

<?php
if(isset($_POST['entrar'])){

	/* Verificação de campos */
	if(empty($_POST['email']) || empty($_POST['senha'])){
		header("location:login.php?campos_obrigatorios");
	} else {
		//Capturamos o e-mail informado
		$usuario = new Usuario;
		$usuario->setEmail($_POST['email']);

		//Buscando um usuário no banco apartir do e-mail
		$dados = $usuario->buscar();


		/* Se dados for falso (ou seja, não tem dados de nenhum usuário cadastrado) */
		if(!$dados){
			// Então, fica no login e dá um feedback.
			echo "não tem ninguém com esse nome aqui";
			header("location:login.php?nao_encontrado");
		} else{

			/* Verificação desenha e login */
			if(password_verify($_POST['senha'], $dados['senha'])){
				echo "Pode entrar!";
			}else {
				echo "Cai fora";
			}	
		}

	}
}
?>
    </div>
    
    
</div>        
        
        
    



<?php 
require_once "inc/rodape.php";
?>

