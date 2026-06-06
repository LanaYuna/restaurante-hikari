<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

require_once ROOT_PATH . 'config/conexao.php';

Class Categoria {

    public static function exibirCategorias(){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return [];
        }

        $sql = "SELECT * FROM categoria ORDER BY nome ASC";
        $resultado = $conexao->query($sql);
        
        $categorias = [];
        if ($resultado && $resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $categorias[] = $linha;
            }
        }
        
        $conexao->close();
        return $categorias; 
    }

    public static function cadastrar($nome){
        $conexao = abrirBanco();

        if($conexao->connect_error){
            return false;
        }

        $sql = "INSERT INTO categoria (nome) VALUES (?)";
        $stmt = $conexao->prepare($sql);

        if(!$stmt){
            $conexao->close();
            return false;
        }

        $stmt->bind_param("s", $nome);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;
    }

    public static function apagar($categoria_id){
        $conexao = abrirBanco();

        if ($conexao->connect_error) {
            return false;
        }

        $sql = "SELECT COUNT(*) AS total
                FROM produto
                WHERE categoria_id = ?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $categoria_id);
        $stmt->execute();

        $resultado = $stmt->get_result()->fetch_assoc();

        $stmt->close();

        if ($resultado["total"] > 0) {

            $conexao->close();
            return "possui_produtos";
        }

        $sql = "DELETE FROM categoria WHERE id = ?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $categoria_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;
    }
}

?>