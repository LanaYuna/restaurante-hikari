<?php

include "../../templates/header.php";

require_once "../../models/Relatorio.php";

$relatorio = Relatorio::produtosMaisBaratos();

?>

<main class="max-w-6xl mx-auto p-8">

    <a href="guia.php">Voltar para o guia</a>
    
    <h1 class="text-3xl font-bold mb-8 mt-6">
        Produtos mais Baratos
    </h1>

    <div class="bg-zinc-900 rounded-xl overflow-hidden border border-zinc-800">

        <table class="w-full">

            <thead class="bg-zinc-800">

                <tr>

                    <th class="p-4 text-left">
                        Nome
                    </th>

                    <th class="p-4 text-center">
                        Preço
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($relatorio as $produto): ?>

                    <tr class="border-t border-zinc-800">

                        <td class="p-4">
                            <?= htmlspecialchars($produto['nome']) ?>
                        </td>

                        <td class="p-4 text-center">
                            <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </td>


                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>
</body>
</html>
