<form action="../../controllers/CarrinhoController.php" method="POST" class="flex flex-col gap-4">
    <div
        id="modalProduto"
        class="hidden fixed inset-0 z-[100] items-center justify-center p-4 backdrop-blur-sm"
    >
        <div class="bg-zinc-900 w-full max-w-xl rounded-2xl border border-zinc-700 p-6 shadow-2xl">
            <div class="flex items-center gap-4 justify-between mb-6 p-3">

                <h2 class="text-xl font-bold text-white ">
                    Detalhes do produto
                </h2>

                <button
                    id="fecharModalProduto"
                    class="text-zinc-400 hover:text-red-500 transition"
                >
                    X
                </button>

            </div>

            <div class="bg-zinc-900 p-6 rounded-xl w-[500px] flex flex-col">

                <img id="modalImagem">

                <h2 id="modalNome" class="text-lg"></h2>

                <p id="modalDescricao"></p>

                <span id="modalPreco"  class="mt-4"></span>

                <label for="quantidade">Quantidade:</label>
                <input
                    type="number"
                    id="quantidade"
                    value="1"
                    min="1"
                    class="m-5"
                >

                <button 
                    type="submit"
                    name="acao"
                    value="adicionar"
                    class="bg-red-500 hover:bg-red-600 transition p-3 rounded-lg font-semibold mt-4"                    
                >
                    Adicionar ao Carrinho
                </button>

            </div>
        </div>
    </div>
</form>