<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

require_once ROOT_PATH . 'config/conexao.php';

class Endereco {

    public static function cadastrar($rua, $numero, $complemento, $usuario_id){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return false;
        }

        $sql = "INSERT INTO endereco (rua, numero, complemento, usuario_id)
                VALUES (?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);

        if(!$stmt){
            $conexao->close();
            return false;
        }

        $stmt->bind_param("sisi", $rua, $numero, $complemento, $usuario_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;
    }

    public static function procurarEndereco($usuario_id){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return null;
        }

        $sql = "SELECT * FROM endereco WHERE usuario_id = ?";
        $stmt = $conexao->prepare($sql);

        if($stmt){

            $stmt->bind_param("i", $usuario_id); 

            if($stmt->execute()){

                $resultadoBanco = $stmt->get_result();

                if($resultadoBanco->num_rows > 0){
                    $endereco = $resultadoBanco->fetch_assoc(); 
                    
                    $stmt->close();
                    $conexao->close();

                    return $endereco; 
                }
            } 

            $stmt->close();
            
        } else{
            echo "Preparação falhou". $conexao->connect_error;
        }

        $conexao->close();
        return null;
    }

    public static function editar($rua, $numero, $complemento, $usuario_id){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return false;
        }

        $sql = "UPDATE endereco SET rua = ?, numero = ?, complemento = ? WHERE usuario_id = ?";

        $stmt = $conexao->prepare($sql);

        if(!$stmt){
            $conexao->close();
            return false;
        }

        $stmt->bind_param("sisi", $rua, $numero, $complemento, $usuario_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;
    }
    
    public static function apagar($usuario_id){
        
        $conexao = abrirBanco();

        if($conexao->connect_error){
            return false;
        }

        $sql = "DELETE FROM endereco WHERE usuario_id = ?";
        $stmt = $conexao->prepare($sql);

        $stmt->bind_param("i", $usuario_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;

    }

}
?>