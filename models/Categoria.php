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
        return $categorias; // Retorna uma array com todas as categorias
    }
}

?>