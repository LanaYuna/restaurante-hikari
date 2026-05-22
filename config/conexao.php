<?php

    function abrirBanco(){
        $conexao= new mysqli("localhost","root","","sistema_hikari", 3307);
        return $conexao;
    }

    
?>