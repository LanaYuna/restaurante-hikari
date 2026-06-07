<?php

include "../../templates/header.php";

require_once "../../models/Relatorio.php";

$relatorio = Relatorio::faturamentoPorPeriodo();

?>

<main class="max-w-6xl mx-auto p-8">

    <a href="guia.php">Voltar para o guia</a>
    
    <h1 class="text-3xl font-bold mb-8 mt-6">
        Relatório Faturamento
    </h1>

    <div class="bg-zinc-900 rounded-xl overflow-hidden border border-zinc-800">

        <table class="w-full">

            <thead class="bg-zinc-800">

                <tr>

                    <th class="p-4 text-left">
                        Data
                    </th>

                    <th class="p-4 text-center">
                        Total Pedidos
                    </th>

                    <th class="p-4 text-center">
                        Faturamento
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($relatorio as $faturamento): ?>

                    <tr class="border-t border-zinc-800">

                        <td class="p-4">
                            <?= htmlspecialchars($faturamento['data']) ?>
                        </td>

                        <td class="p-4 text-center">
                            <?= $faturamento['total_pedidos'] ?>
                        </td>

                        <td class="p-4 text-center text-green-500 font-semibold">
                            R$
                            <?= number_format(
                                $faturamento['faturamento'],
                                2,
                                ',',
                                '.'
                            ) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>
</body>
</html>
