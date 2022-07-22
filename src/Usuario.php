<?php
namespace Microblog;
use PDO, Exception;

final class Usuario {
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $tipo;
    private PDO $conexao;

    public function __construct()
    {
        // Acessamos o Banco através do $this, pois ele é estático.
        $this->conexao = Banco::conecta();
    }

    // Criando a função para lermos os usuários, através do SQL
    public function listar():array {
        $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Errou:". $erro->getMessage());
        }
        return $resultado;
    }
}