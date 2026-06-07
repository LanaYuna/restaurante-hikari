<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

require_once ROOT_PATH . 'config/conexao.php';

class Relatorio{

    private static function executarConsulta($sql){

        $conexao = abrirBanco();

        $resultado = $conexao->query($sql);

        $dados = [];

        while($linha = $resultado->fetch_assoc()){
            $dados[] = $linha;
        }

        $conexao->close();

        return $dados;
    }

    public static function produtosMaisVendidos(){

        $sql = "
            SELECT
                p.nome,
                SUM(ip.quantidade) AS total_vendido,
                SUM(ip.quantidade * ip.preco_unitario) AS receita
            FROM item_pedido ip
            INNER JOIN produto p
                ON p.id = ip.produto_id
            GROUP BY p.id
            ORDER BY total_vendido DESC
        ";

        return self::executarConsulta($sql);
    }

    public static function vendasPorCategoria(){

        $sql = "
            SELECT
                c.nome,
                SUM(ip.quantidade) AS total_vendido,
                SUM(ip.quantidade * ip.preco_unitario) AS receita
            FROM item_pedido ip
            INNER JOIN produto p
                ON p.id = ip.produto_id
            INNER JOIN categoria c
                ON c.id = p.categoria_id
            GROUP BY c.id
            ORDER BY receita DESC
        ";

        return self::executarConsulta($sql);
    }

   public static function produtosMaisFavoritados(){

        $sql = "
            SELECT
                p.nome,
                COUNT(*) AS total_favoritos
            FROM produto_favorito f
            INNER JOIN produto p
                ON p.id = f.produto_id
            GROUP BY p.id
            ORDER BY total_favoritos DESC
        ";

        return self::executarConsulta($sql);
    }

    public static function clientesMaisCompram(){

        $sql = "
            SELECT
                u.nome,
                COUNT(p.id) AS total_pedidos,
                SUM(p.total) AS total_gasto
            FROM pedido p
            INNER JOIN usuario u
                ON u.id = p.usuario_id
            GROUP BY u.id
            ORDER BY total_gasto DESC
        ";

        return self::executarConsulta($sql);
    }

    public static function produtosMaisBaratos(){

        $sql = "
            SELECT 
                p.nome, 
                p.preco 
            FROM produto AS p
            ORDER BY preco ASC
        ";

        return self::executarConsulta($sql);

    }

    public static function faturamentoPorPeriodo(){

        $sql = "
            SELECT
                DATE(data_pedido) AS data,
                COUNT(*) AS total_pedidos,
                SUM(total) AS faturamento
            FROM pedido
            GROUP BY DATE(data_pedido)
            ORDER BY data DESC
        ";

        return self::executarConsulta($sql);
    }

}

?>