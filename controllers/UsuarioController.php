<?php

session_start();
$usuario_id = $_SESSION["usuario_id"];
$email = $_SESSION["usuario_email"];

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

    if($_POST["acao"] == "editar"){

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        if( trim($nome) === "" || trim($email) === "" || trim($telefone) === ""){

            header("Location: ../views/geral/contaUsuario.php?erro=campos_vazios");
            die;
        }

        $resultado = Usuario::editar(
            $nome,
            $email,
            $telefone,
            $usuario_id
        );

        if($resultado){
            header("Location: ../views/geral/contaUsuario.php?edicao=sucesso");
        } else {
            header("Location: ../views/geral/contaUsuario.php?edicao=erro");
        }

        die;

    }

    if($_POST["acao"] == "alterarSenha"){

        $senhaAtual = $_POST["senhaAtual"];
        $senhaNova = $_POST["senhaNova"];

        $resultado = Usuario::buscarEmail($email);

        if($resultado){
            $senhaBanco = $resultado["senha"];

            if(password_verify($senha, $senhaBanco)){ 

                $resultadoAtualizacao = Usuario::alterarSenha();
        
                    header("Location: ../views/geral/contaUsuario.php?edicao=sucesso");
                    
                } else {
                    // Senha incorreta
                    header("Location: ../views/views/geral/contaUsuario.php?edicao=erro");
                }
            }
        die;

    }

    if($_POST["acao"] == "apagar"){

        $resultado = Usuario::apagar($usuario_id);

        if($resultado){

            session_start();
            session_unset();
            session_destroy();

            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            header("Location: ../index.php");
            exit();
        } else {

            header("Location: ../views/geral/contaUsuario.php?exclusao=erro");
        }
    }

}

?>