<?php
    function abrirBanco(){
        $conexao= new mysqli("localhost","root","","hikari_sistema", 3307);
        return $conexao;
    }

    
?>