<?php
namespace Microblog;

final class ControleDeAcesso {
    public function __construct()
    {
        // Se NÃO existir uma sessão em funcionamento
        if(!isset($_SESSION) ){ 
            // Então iniciamos a sessão
            session_start();
        }
    }

    public function verificaAcesso():void
    {
        // Se não existir uma variável de sessão relacionada ao id do usuario logado...
        if(!isset($_SESSION['id']) ){
            // Então significa que o usuário não está logado, portanto apague qualquer resquício de sessão e force o usuário a ir para o login.php
            session_destroy();
            header("location:../login.php?acesso_proibido");
            die(); // exit;
        }
    }
}