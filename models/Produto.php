<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

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

    public static function favoritarOuDesfavoritar($usuarioId, $produtoId){

        $conexao = abrirBanco();

        if ($conexao->connect_error) {
            return ['error' => 'Falha na conexão com o banco'];
        }

        $sqlCheck = "SELECT id FROM produto_favorito WHERE usuario_id = ? AND produto_id = ?";
        $stmtCheck = $conexao->prepare($sqlCheck);
        
        if ($stmtCheck) {
            $stmtCheck->bind_param("ii", $usuarioId, $produtoId);
            $stmtCheck->execute();
            $resultadoCheck = $stmtCheck->get_result();
            $jaFavoritado = $resultadoCheck->num_rows > 0;
            $stmtCheck->close();

            if ($jaFavoritado) {
                $sqlDelete = "DELETE FROM produto_favorito WHERE usuario_id = ? AND produto_id = ?";
                $stmtDelete = $conexao->prepare($sqlDelete);
                if ($stmtDelete) {
                    $stmtDelete->bind_param("ii", $usuarioId, $produtoId);
                    $stmtDelete->execute();
                    $stmtDelete->close();
                }
                $conexao->close();
                return ['status' => 'removido'];
            } else {
                $sqlInsert = "INSERT INTO produto_favorito (usuario_id, produto_id) VALUES (?, ?)";
                $stmtInsert = $conexao->prepare($sqlInsert);
                if ($stmtInsert) {
                    $stmtInsert->bind_param("ii", $usuarioId, $produtoId);
                    $stmtInsert->execute();
                    $stmtInsert->close();
                }
                $conexao->close();
                return ['status' => 'adicionado'];
            }
        }

        $conexao->close();
        return ['error' => 'Falha ao preparar a consulta'];
    }

    public static function buscarFavoritosDoUsuario($usuarioId){

        $conexao = abrirBanco();

        if ($conexao->connect_error) {
            return [];
        }

        $sql = "SELECT p.* FROM produto p 
                INNER JOIN produto_favorito pf ON p.id = pf.produto_id 
                WHERE pf.usuario_id = ? 
                ORDER BY pf.criado_em DESC";
                
        $stmt = $conexao->prepare($sql);
        $produtosFavoritos = [];
        if ($stmt){
            $stmt->bind_param("i", $usuarioId);
            $stmt->execute();
            $resultado = $stmt->get_result();

            while ($linha = $resultado->fetch_assoc()) {
                $produtosFavoritos[] = $linha;
            }
            $stmt->close();
        }

        $conexao->close();
        return $produtosFavoritos;
    }
}

?>