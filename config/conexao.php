<?php
    // "define" cria variavel CONSTANTE GLOBAL
    if (!defined('ROOT_PATH')) {
        define('ROOT_PATH', dirname(__DIR__) . '/'); 
    }

    function abrirBanco(){
        $servidor = "localhost";
        $username = "root";
        $senha = "";
        $nomedb = "sistema_hikari";
        
        $conexao= new mysqli($servidor, $username, $senha, $nomedb);
        return $conexao;
    }


?>  