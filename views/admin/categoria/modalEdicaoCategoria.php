<div
    id="modalEdicaoCategoria-<?= $categoria['id'] ?>"
    class="hidden fixed inset-0 bg-black/60 z-[100] items-center justify-center px-4 backdrop-blur-sm"
>

    <div class="bg-zinc-900 w-full max-w-md rounded-2xl border border-zinc-700 p-6 shadow-2xl">

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-xl font-bold text-white">
                Atualizar Categoria
            </h2>

            <button
                type="button"
                data-id="<?= $categoria['id'] ?>"
                class="fecharModalEdicaoCategoria text-zinc-400 hover:text-red-500 transition font-bold"
            >
                X
            </button>

        </div>

        <form
            action="../../controllers/CategoriaController.php"
            method="POST"
            class="flex flex-col gap-4"
        >

            <input
                type="hidden"
                name="categoria_id"
                value="<?= $categoria['id'] ?>"
            >

            <div class="flex flex-col gap-1">

                <label class="text-xs font-semibold text-zinc-400 pl-1">
                    Nome da Categoria
                </label>

                <input
                    type="text"
                    name="nome"
                    value="<?= htmlspecialchars($categoria['nome']) ?>"
                    required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white"
                >

            </div>

            <button
                type="submit"
                name="acao"
                value="editar"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold transition"
            >
                Atualizar Categoria
            </button>

        </form>

    </div>

</div>