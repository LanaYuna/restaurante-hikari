<?php

require_once "../models/Usuario.php";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    if($_POST["acao"] == "cadastrar"){

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha =  password_hash($_POST["senha"], PASSWORD_DEFAULT);

        // chama funcao estatica de classe usuario
        $resultado = Usuario::cadastrar(
            $nome,
            $email,
            $senha
        );

        if($resultado){
            
            echo "Usuário cadastrado";

        } else {

            echo "Erro ao cadastrar";
        }
    }

}

?>