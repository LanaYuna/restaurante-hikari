<div
    id="modalEdicaoEndereco"
    class="hidden fixed inset-0 bg-black/60 z-[100] items-center justify-center px-4"
>

    <div class="bg-zinc-900 w-full max-w-md rounded-2xl border border-zinc-700 p-6">

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-xl font-bold text-white">
                Atualizar endereço
            </h2>

            <button
                id="fecharModalCadastro"
                class="text-zinc-400 hover:text-red-500"
            >
                X
            </button>

        </div>

        <form action="../../controllers/EnderecoController.php" method="POST" class="flex flex-col gap-4">

            <input
                type="text"
                name="rua"
                placeholder="Rua"
                value="$_SESSION['']"
                class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white"
            >

            <input
                type="text"
                name="numero"
                placeholder="Número"
                class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white"
            >

            <input
                type="text"
                name="complemento"
                placeholder="Complemento"
                class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white"
            >

            <button
                class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl"
                type="submit"
                name="acao"
                value="cadastrar"
            >
                Salvar endereço
            </button>

        </form>

    </div>

</div>    
    