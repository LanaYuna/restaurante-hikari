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
            header("Location: ../views/auth/cadastro.php?erro=campos_vazios");
            die;
        }

        // chama funcao estatica de classe usuario
        $resultado = Usuario::cadastrar(
            $nome,
            $email,
            $telefone,
            $senha
        );

        if($resultado === "sucesso"){
            
            header("Location: ../views/auth/login.php?cadastro=sucesso");
            die;

        } elseif($resultado === "email_duplicado"){
            header("Location: ../views/auth/cadastro.php?erro=email_duplicado");
            die;

        } elseif($resultado === "telefone_duplicado"){
            header("Location: ../views/auth/cadastro.php?erro=telefone_duplicado");
            die;

        } elseif($resultado === "duplicado") {

            header("Location: ../views/auth/cadastro.php?erro=duplicado");
            die;
        } else {

            header("Location: ../views/auth/cadastro.php?cadastro=erro");
            die;
        }
        
    }

}

?>