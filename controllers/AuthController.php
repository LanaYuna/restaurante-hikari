<?php 

require_once "../models/Usuario.php";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    if($_POST["acao"] == "logar"){

        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if( empty($email) || empty($senha) ){
            // redireciona para index avisando do erro
            header("Location: ../index.php?erro=campos_vazios");
            die;
        };

       $resultado = Usuario::buscarPorEmail(
            $email
       ); 

       if($resultado){
            $senhaBanco = $resultado["senha"];
            
            if(password_verify($senha, $senhaBanco)){ // mecanismo de compararar senha criptografada

                if(session_status() == PHP_SESSION_NONE){ // status estiver com sessao aberta mas ninguem conectado
                    session_start();

                    $_SESSION["usuario_id"] = $resultado["id"];
                    $_SESSION["usuario_nome"] = $resultado["nome"];
                    $_SESSION["usuario_telefone"] = $resultado["telefone"];
                }
                
                header("Location: ../index.php?login=sucesso");

            } else {
                // Senha incorreta
                header("Location: ../index.php?login=erro");
            }
       } else {

            // Usuario nao encontrado
            header("Location: ../index.php?login=erro");
       }
       
       die;
    }

}


?>