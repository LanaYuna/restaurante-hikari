<?php

require_once "../../config/conexao.php";

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