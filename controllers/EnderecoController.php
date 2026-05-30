<?php 

session_start();

require_once "../models/Endereco.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST["acao"] == "cadastrar"){

        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $usuario_id = $_SESSION["usuario_id"];

        if(empty($rua) || empty($numero) || empty($complemento)){

            header("Location: ../views/geral/menu.php?erro=campos_vazios");
            die;
        }

        $resultado = Endereco::cadastrar(
            $rua,
            $numero,
            $complemento,
            $usuario_id
        );


        if($resultado){

            header("Location: ../views/geral/menu.php?cadastro=sucesso");
        } else {

            header("Location: ../views/geral/menu.php?cadastro=erro");
        }

        die;
    }
}

?>