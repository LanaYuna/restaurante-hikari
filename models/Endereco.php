<?php

require_once "../config/conexao.php";

class Endereco {

    public static function cadastrar($rua, $numero, $complemento, $usuario_id){

        $conexao = abrirBanco();

        if(!$conexao->connect_error){
            return false;
        }

        $sql = "INSERT INTO endereco (rua, numero, complemento, usuario_id) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if($stmt){

            $stmt->bind_param("sisi", $rua, $numero, $complemento, $usuario_id);
            $stmt->execute();
            $stmt->close();
            $conexao->close();

            return true;
        }

        $conexao->close();
        return false;

    }
}
?>