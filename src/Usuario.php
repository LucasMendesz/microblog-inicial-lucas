<?php
 namespace Microblog;
 use PDO,Exception;

 Final class Usuario {
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $tipo;
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Banco::conecta();
    }

    public function listar(){
       $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";

       try {
         $consulta = $this->conexao->prepare($sql);
         $consulta->execute();
         $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
       } catch (Exception $erro) {
        die("Erro: ". $erro->getMessage());
       }
       return $resultado;
    }

    
 }

//  try {
        
// } catch (Exception $erro) {
//  die("Erro: ". $erro->getMessage())
// }
// }