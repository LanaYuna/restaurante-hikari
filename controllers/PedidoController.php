<?php

session_start();

require_once "../models/Pedido.php";
require_once "../models/Endereco.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $acao = $_POST["acao"] ?? "";

    if ($acao === "comprar") {

        $usuario_id = $_SESSION["usuario_id"] ?? null;
        $carrinho = $_SESSION["carrinho"] ?? [];
        $pagamento = $_POST["metodo_pagamento"] ?? "";
        $modalidade = $_POST["modalidade"] ?? "";

        if (!$usuario_id) {
            header("Location: ../views/auth/login.php");
            die;
        }

        if (empty($carrinho)) {
            header("Location: ../views/geral/carrinho.php?erro=carrinho_vazio");
            die;
        }

        if (empty($pagamento)) {
            header("Location: ../views/geral/carrinho.php?erro=pagamento");
            die;
        }

        if (empty($modalidade)) {
            header("Location: ../views/geral/carrinho.php?erro=modalidade");
            die;
        }

        if($modalidade == 'delivery'){

            $resultado = Endereco::procurarEndereco($_SESSION['usuario_id']);
            
            if($resultado == null){
                header("Location: ../views/geral/carrinho.php?erro=endereco");
                die;
            }
        }

        $resultado = Pedido::finalizarPedido(
            $usuario_id,
            $carrinho,
            $pagamento
        );

        if ($resultado === true) {

            $_SESSION["carrinho"] = [];

            header("Location: ../views/geral/carrinho.php?pedido=sucesso");

        } else {

            header("Location: ../views/geral/carrinho.php?pedido=erro");
        }

        die;
    }
}
?>