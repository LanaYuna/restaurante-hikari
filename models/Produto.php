<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

require_once ROOT_PATH . 'config/conexao.php';

Class Produto {

    public static function buscarPorCategoria($categoriaId){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return [];
        }

        $sql = "SELECT * FROM produto WHERE categoria_id = ?";
        $stmt = $conexao->prepare($sql);
        
       $produtos = [];
        if ($stmt) {
            $stmt->bind_param("i", $categoriaId); 
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            while ($linha = $resultado->fetch_assoc()) {
                $produtos[] = $linha;
            }
            $stmt->close();
        }
        
        $conexao->close();
        return $produtos; 
    }

    public static function editar($id, $nome, $descricao, $preco, $imagem){

        $conexao = abrirBanco();

        $sql = "UPDATE produto SET nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
            
            $stmt = $conexao->prepare($sql);
            
            if ($stmt === false) {
                die("Erro na preparação do SQL: " . $conexao->error);
            }
            
            $stmt->bind_param("ssssi", $nome, $descricao, $preco, $imagem, $id);

            $resultado = $stmt->execute();
            
            $stmt->close();
            
            return $resultado;
    }

    public static function apagar($produto_id){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return false;
        }

        $sql = "DELETE FROM produto WHERE id = ?";
        $stmt = $conexao->prepare($sql);

        $stmt->bind_param("i", $produto_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;

    }
}

?>