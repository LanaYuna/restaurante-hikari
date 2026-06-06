<?php

include "../../templates/header.php";

session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$total = 0;

?>

<a href="menu.php" class="font-bold">Voltar para o menu</a>

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Meu Carrinho
    </h1>

    <?php if (empty($_SESSION['carrinho'])): ?>

        <p>
            Seu carrinho está vazio.
        </p>

    <?php else: ?>

        <?php foreach ($_SESSION['carrinho'] as $id => $item): ?>

            <?php
                $subtotal = $item['preco'] * $item['quantidade'];
                $total += $subtotal; 
            ?>

            <div class="border rounded-lg p-4 mb-4 flex justify-between items-center">

                <div>

                    <h3 class="text-xl font-semibold">
                        <?= htmlspecialchars($item['nome']) ?>
                    </h3>

                    <p>
                        Preço: R$ <?= number_format($item['preco'], 2, ',', '.') ?>
                    </p>

                    <p>
                        Quantidade: <?= $item['quantidade'] ?>
                    </p>

                    <p class="font-bold">
                        Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?>
                    </p>

                </div>

                <div class="flex gap-2">

                    <form action="../../controllers/CarrinhoController.php" method="POST">

                        <input
                            type="hidden"
                            name="produto_id"
                            value="<?= $id ?>"
                        >

                        <input
                            type="number"
                            name="quantidade"
                            value="<?= $item['quantidade'] ?>"
                            min="1"
                            class="w-24 bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-white"
                        >

                        <button
                            type="submit"
                            name="acao"
                            value="editar"
                            class="bg-blue-500 text-white px-3 py-2 rounded"
                        >
                            Editar
                        </button>

                    </form>

                    <form action="../../controllers/CarrinhoController.php" method="POST">

                        <input
                            type="hidden"
                            name="produto_id"
                            value="<?= $id ?>"
                        >

                        <button
                            type="submit"
                            name="acao"
                            value="remover"
                            class="bg-red-500 text-white px-3 py-2 rounded"
                            onclick="return confirm('Deseja remover este item?')"
                        >
                            Remover
                        </button>

                    </form>

                </div>

            </div>

        <?php endforeach; ?>

        <div class="mt-8 border-t pt-4">

            <h2 class="text-2xl font-bold mb-4">
                Resumo do Pedido
            </h2>

            <p class="text-xl mb-4">
                Total: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong>
            </p>

            <form action="../../controllers/PedidoController.php" method="POST">

                <button
                    type="submit"
                    name="acao"
                    value="comprar"
                    class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700"
                >
                    Finalizar Compra
                </button>

            </form>

        </div>

    <?php endif; ?>

</div>
</body>
</html>