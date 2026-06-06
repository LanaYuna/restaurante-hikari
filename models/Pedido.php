<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

require_once ROOT_PATH . 'config/conexao.php';

class Pedido {

    public static function finalizarPedido( $usuario_id, $carrinho, $pagamento) {

        $conexao = abrirBanco();

        if ($conexao->connect_error) {
            return false;
        }

        try {

            $conexao->begin_transaction();

            $total = 0;

            foreach ($carrinho as $item) {

                $total += (
                    $item["preco"] *
                    $item["quantidade"]
                );
            }

            $sql = "INSERT INTO pedido(usuario_id, data_pedido, total, pagamento) VALUES(?, NOW(), ?, ?)";

            $stmt = $conexao->prepare($sql);

            $stmt->bind_param(
                "ids",
                $usuario_id,
                $total,
                $pagamento
            );

            $stmt->execute();

            $pedido_id = $conexao->insert_id;

            $stmt->close();

            $sql = "INSERT INTO item_pedido(pedido_id, produto_id, quantidade, preco_unitario) VALUES(?, ?, ?, ?)";

            $stmt = $conexao->prepare($sql);

            foreach ($carrinho as $produto_id => $item) {

                $quantidade = $item["quantidade"];
                $preco = $item["preco"];

                $stmt->bind_param(
                    "iiid",
                    $pedido_id,
                    $produto_id,
                    $quantidade,
                    $preco
                );

                $stmt->execute();
            }

            $stmt->close();

            $conexao->commit();

            $conexao->close();

            return true;

        } catch (Exception $erro) {

            $conexao->rollback();

            $conexao->close();

            return false;
        }
    }

    public static function exibirPedidos($usuario_id){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return [];
        }

        $sql = "SELECT * FROM pedido";
        $resultado = $conexao->query($sql);
        
        $pedidos = [];
        if ($resultado && $resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $pedidos[] = $linha;
            }
        }
        
        $conexao->close();
        return $pedidos; 
    }
}
?>