<div
    id="modalEdicaoProduto-<?= $produto['id'] ?>" 
    class="hidden fixed inset-0 bg-black/60 z-[100] items-center justify-center px-4 backdrop-blur-sm"
>

    <div class="bg-zinc-900 w-full max-w-md rounded-2xl border border-zinc-700 p-6 shadow-2xl">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-white">
                Atualizar produto
            </h2>

            <button
                type="button"
                data-id="<?= $produto['id'] ?>"
                class="fecharModalEdicao text-zinc-400 hover:text-red-500 transition font-bold"
            >
                X
            </button>
        </div>

        <form 
            action="../../controllers/ProdutoController.php" 
            method="POST" 
            enctype="multipart/form-data" 
            class="flex flex-col gap-4 text-left"
        >

            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <input type="hidden" name="imagemAtual" value="<?= $produto['imagem'] ?>">

            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-zinc-400 pl-1">Nome do Produto</label>
                <input
                    type="text"
                    name="nome"
                    placeholder="Nome do produto"
                    value="<?= htmlspecialchars($produto['nome']) ?>"
                    required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white focus:outline-none focus:border-zinc-500 transition"
                >
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-zinc-400 pl-1">Descrição</label>
                <textarea
                    name="descricao"
                    placeholder="Descrição do produto"
                    rows="3"
                    required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white focus:outline-none focus:border-zinc-500 transition resize-none"
                ><?= htmlspecialchars($produto['descricao']) ?></textarea>
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-zinc-400 pl-1">Preço (R$)</label>
                <input
                    type="number"
                    step="0.01"
                    name="preco"
                    placeholder="0.00"
                    value="<?= htmlspecialchars($produto['preco']) ?>"
                    required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg p-3 text-white focus:outline-none focus:border-zinc-500 transition"
                >
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-zinc-400 pl-1">Foto do Produto (Deixe vazio para manter a atual)</label>
                <div class="flex items-center gap-3 bg-zinc-800 border border-zinc-700 rounded-lg p-2">
                    <input
                        type="file"
                        name="imagem" 
                        accept="image/*"
                        class="w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-700 file:text-white hover:file:bg-zinc-600 file:transition cursor-pointer"
                    >
                </div>
            </div>

            <button
                class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl font-bold transition mt-2 shadow-lg"
                type="submit"
                name="acao"
                value="editar"
            >
                Atualizar produto
            </button>

        </form>

    </div>
</div>
