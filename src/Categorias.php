<?php
namespace Microblog;
use PDO, Exception;


class Categorias{
    private int $id;
    private string $nome;
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Banco::conecta();
    }

    public function listarCategoria(int $id, string $nome):array{
        $sql = "SELECT id, nome FROM categorias";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Errou:". $erro->getMessage());
        }
        return $resultado;

    }

    public function listarUm():array {
        $sql = "SELECT * FROM categorias WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function inserir():void {
        $sql = "INSERT INTO categorias(nome) VALUES(:nome)";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Deu ruim ". $erro->getMessage());
        }
    }



    
    public function getId(): int
    {
        return $this->id;
    }

    
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    
    public function getNome(): string
    {
        return $this->nome;
    }

    
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }
}
?>