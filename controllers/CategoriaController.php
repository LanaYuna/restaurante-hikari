<?php

require_once "../models/Categoria.php";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    $acao = $_POST["acao"] ?? "";

    if($acao == "cadastrar"){
        $nome = $_POST["nome"];

        $resultado = Categoria::cadastrar($nome);

        if($resultado){

            header("Location: ../views/geral/menu.php?cadastro=sucesso");
        } else {

            header("Location: ../views/geral/menu.php?cadastro=erro");
        }

        die;
    }

    if($acao == "editar"){
        $categoria_id = $_POST['categoria_id'];
        $nome = $_POST['nome'];

        $resultado = Categoria::editar($categoria_id, $nome);

        if($resultado){

            header("Location: ../views/geral/menu.php?editar=sucesso");
        } else {
            header("Location: ../views/geral/menu.php?editar=erro");
        }
    }

   if($acao == "apagar"){

        $categoria_id = $_POST['categoria_id'];

        $resultado = Categoria::apagar($categoria_id);

        if($resultado === "possui_produtos"){

            header("Location: ../views/geral/menu.php?delecao=possui_produtos");

        } elseif($resultado){

            header("Location: ../views/geral/menu.php?delecao=sucesso");

        } else {

            header("Location: ../views/geral/menu.php?delecao=erro");

        }

        die();
    }

};

?>