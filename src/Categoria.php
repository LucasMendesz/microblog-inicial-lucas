<?php
namespace Microblog;
use PDO, Exception;

Final class Categoria
{
    private int $id;
    private string $nome;
    private PDO $conexao;

    public function __construct()
    {
     $this->conexao = Banco::conecta();   
    }

    public function listar()
    {
        $sql = "SELECT id, nome FROM categorias order by nome";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ".$erro->getMessage());
        }
        return $resultado;
    }

    public function inserir()
    {
     $sql = "INSERT INTO categorias(nome) VALUES (:nome)";

     try {
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $consulta->execute();
     } catch (Exception $erro) {
        die("Erro ". $erro->getMessage());
     }
    }

    public function listaUm()
    {
        $sql = "SELECT * FROM categorias WHERE id =:id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ". $erro->getMessage());
        }
        return $resultado;
    }

    public function atualizar()
    {
        $sql = "UPDATE categorias SET nome = :nome WHERE id =:id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ". $erro->getMessage());
        }
    }

    public function excluir()
    {
        $sql = "DELETE FROM categorias WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ". $erro->getMessage());
        }
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}