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
            $stmt->bind_param("i", $categoriaId); // "i" de integer (ID)
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            while ($linha = $resultado->fetch_assoc()) {
                $produtos[] = $linha;
            }
            $stmt->close();
        }
        
        $conexao->close();
        return $produtos; // Retorna apenas os produtos daquela categoria específica
    }
}

?>