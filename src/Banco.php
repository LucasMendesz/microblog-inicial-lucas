<?php
namespace Microblog;
// Indicamos o uso das classes nativas do PHP(ou seja, classes que não fazem parte do nosso namespace)
use Exception;
use PDO;

abstract class Banco {
    // Propriedades/atributos de acesso ao servidor de Banco de Dados
    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "microblog_lucas";
    // private static \PDO $conexao; // não precisa do use PDO
    private static PDO $conexao; //precisa do "use PDO"

    // Método de conexão ao banco
    public static function conecta():PDO {
       try {
        // Criando a Conexão com o MySQL (API/Driver de conexão)
        self::$conexao = new PDO (
            "mysql:host=".self::$servidor.";
            dbname=".self::$banco.";
            charset=utf8",
            self::$usuario, // Self permite acessar recursos estaticos da propria classe
            self::$senha
        );

        // Habilitação a verificação de erros
        self::$conexao->setAttribute (
        PDO::ATTR_ERRMODE, // Constante de erros em geral
        PDO::ERRMODE_EXCEPTION // Constante de exceções de erro
        );

       
        // echo "Ok!";
       } catch (Exception $erro) {
        die("Deu ruim: ".$erro->getMessage());
       }
       return self::$conexao;
    }
}
//  Banco::conecta(); Teste
?>