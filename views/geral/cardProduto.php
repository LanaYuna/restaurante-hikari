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

        <form action="../../controllers/CarrinhoController.php" method="POST" class="flex flex-col gap-4">
            <div class="bg-zinc-900 p-6 rounded-xl flex flex-col gap-4">

                <img id="modalImagem" class="w-full h-56 object-cover rounded-lg">

                <div>
                    <h2 id="modalNome" class="text-2xl font-bold"></h2>
                    <p id="modalDescricao" class="text-zinc-400 mt-2"></p>
                </div>

                <span id="modalPreco" class="text-xl font-semibold text-red-500"></span>

                <div class="flex flex-col gap-2">

                    <label for="quantidade" class="font-medium">
                        Quantidade
                    </label>

                    <input
                        type="number"
                        id="quantidade"
                        min="1"
                        value="1"
                        class="w-24 bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-white"
                    >

                </div>


                <button
                    type="submit"
                    name="acao"
                    value="adicionar"
                    class="bg-red-500 hover:bg-red-600 transition p-3 rounded-lg font-semibold"
                >
                    Adicionar ao Carrinho
                </button>
                
            </div>
        </form>
    </div>
</div>
