<?php include "../../templates/header.php" ?>

<main class="min-h-screen bg-zinc-950 p-10">

    <a href="../geral/menu.php">Voltar para o menu</a>
    
    <div class="max-w-6xl mx-auto mt-4">

        <div class="mb-10">
            <h1 class="text-4xl font-bold text-white">
                Relatórios
            </h1>

            <p class="text-zinc-400 mt-2 mb-6">
                Visualize indicadores e estatísticas do restaurante.
            </p>
        </div>

        <div class="grid grid-cols-3 gap-6">

            <a
                href="relatorioProdutosVendidos.php"
                class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-red-600 transition-all group"
            >
                <h2 class="text-xl font-bold text-white group-hover:text-red-500">
                    Produtos Mais Vendidos
                </h2>

                <p class="text-zinc-400 mt-2">
                    Veja quais pratos tiveram mais vendas e geraram maior receita.
                </p>
            </a>

            <a
                href="relatorioCategorias.php"
                class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-red-600 transition-all group"
            >
                <h2 class="text-xl font-bold text-white group-hover:text-red-500">
                    Vendas por Categoria
                </h2>

                <p class="text-zinc-400 mt-2">
                    Compare o desempenho de cada categoria do cardápio.
                </p>
            </a>

            <a
                href="relatorioFavoritos.php"
                class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-red-600 transition-all group"
            >
                <h2 class="text-xl font-bold text-white group-hover:text-red-500">
                    Produtos Mais Favoritados
                </h2>

                <p class="text-zinc-400 mt-2">
                    Descubra quais produtos despertam mais interesse nos clientes.
                </p>
            </a>

            <a
                href="relatorioClientes.php"
                class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-red-600 transition-all group"
            >
                <h2 class="text-xl font-bold text-white group-hover:text-red-500">
                    Clientes que Mais Compram
                </h2>

                <p class="text-zinc-400 mt-2">
                    Consulte os clientes com maior volume de pedidos e gastos.
                </p>
            </a>

            <a
                href="relatorioProdutosBaratos.php"
                class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-red-600 transition-all group"
            >
                <h2 class="text-xl font-bold text-white group-hover:text-red-500">
                    Produtos mais Baratos
                </h2>

                <p class="text-zinc-400 mt-2">
                    Consulte os pratos mais baratos.
                </p>
            </a>

             <a
                href="relatorioFaturamento.php"
                class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-red-600 transition-all group"
            >
                <h2 class="text-xl font-bold text-white group-hover:text-red-500">
                    Faturamento por Período
                </h2>

                <p class="text-zinc-400 mt-2">
                    Consulte quanto o restaurante faturou.
                </p>
            </a>

        </div>

    </div>

</main>

<?php include "../../templates/footer.php" ?>