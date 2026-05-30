<?php

require_once "../models/Usuario.php";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    if($_POST["acao"] == "cadastrar"){
      
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $senha =  password_hash($_POST["senha"], PASSWORD_DEFAULT);

        if(empty($nome) ||  empty($email) || empty($telefone) || empty($senha)){

            header("Location: ../views/auth/cadastro.php?erro=campos_vazios");
            die;
        }

        $resultado = Usuario::cadastrar(
            $nome,
            $email,
            $telefone,
            $senha
        );

        if($resultado === "sucesso"){
            
            header("Location: ../views/auth/login.php?cadastro=sucesso");

        } elseif($resultado === "email_duplicado"){

            header("Location: ../views/auth/cadastro.php?erro=email_duplicado");
            
        } elseif($resultado === "telefone_duplicado"){
            
            header("Location: ../views/auth/cadastro.php?erro=telefone_duplicado");
      
        } elseif($resultado === "duplicado") {

            header("Location: ../views/auth/cadastro.php?erro=duplicado");
  
        } else {

            header("Location: ../views/auth/cadastro.php?cadastro=erro");
    
        }
        
        die;
    }

}

?>