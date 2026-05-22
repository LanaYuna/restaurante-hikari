<?php

    function abrirBanco(){
        $servidor = "localhost";
        $username = "root";
        $senha = "";
        $nomedb = "sistema_hikari";
        $porta = 3307;
        
        $conexao= new mysqli($servidor, $username, $senha, $nomedb, $porta);
        return $conexao;
    }

    function voltarIndex(){
        header("location:../index.php");
    }
    
?>