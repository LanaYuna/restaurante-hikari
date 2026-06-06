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
        
    }

    if($acao == "apagar"){
        $categoria_id = $_POST['categoria_id'];

        $resultado = Categoria::apagar($categoria_id);

        if($resultado){

            header("Location: ../views/geral/menu.php?delecao=sucesso");
        } else {

            header("Location: ../views/geral/menu.php?delecao=erro");
        }

        die;
    }


};

?>