<?php

require_once "../models/Usuario.php";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    if($_POST["acao"] == "cadastrar"){
      
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $senha =  password_hash($_POST["senha"], PASSWORD_DEFAULT);

        if(empty($nome) ||  empty($email) || empty($telefone) || empty($senha)){
            // redireciona para index avisando do erro
            header("Location: ../index.php?erro=campos_vazios");
            die;
        }

        // chama funcao estatica de classe usuario
        $resultado = Usuario::cadastrar(
            $nome,
            $email,
            $telefone,
            $senha
        );

        if($resultado){
            
            header("Location: ../index.php?sucesso=cadastrado");
        } else {

            header("Location: ../index.php?erro=banco");
        }
        die;
    }

}

?>