<?php
    include "../../templates/header.php";
    include "../../templates/navbar.php"; // tem session_start()

    require_once "../../models/Categoria.php";
    require_once "../../models/Produto.php";

    $listaCategorias = Categoria::exibirCategorias();
?>

<main class="w-full p-24">

    <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'admin'): ?>

    <form action="../../controllers/CategoriaController.php" method="POST">
        <button class="mb-12 w-56 items-center justify-center gap-2 text-center bg-red-700 hover:bg-red-800 text-white py-3 rounded-xl transition"
            name="acao"
            value="adicionar"
        >
            Adicionar Categoria
        </button>
    </form>
    
    <?php endif; ?>

    <?php foreach ($listaCategorias as $categoria): ?>

        <section class="mb-12">
            <h2 class="text-3xl font-bold text-zinc-100 border-l-4 border-red-600 pl-3 mb-6">
                <?php echo $categoria['nome']; ?>
            </h2>

            <?php
                $produtosDaCategoria = Produto::buscarPorCategoria($categoria['id']);
            ?>

            <?php if(empty($produtosDaCategoria)): ?>
                <p class="text-zinc-500 text-sm italic">Nenhum prato disponível nessa categoria</p>
            <?php else: ?>
                
                <div class="grid grid-cols-4 gap-5">

                 <?php foreach ($produtosDaCategoria as $produto): ?>
                    
                    <div
                        class="abrirCardProduto bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex flex-col justify-between gap-4 hover:border-zinc-700 transition-all cursor-pointer relative"
                        data-id="<?php echo $produto['id']; ?>"
                        data-nome="<?php echo $produto['nome']; ?>"
                        data-descricao="<?php echo $produto['descricao']; ?>"
                        data-preco="<?php echo $produto['preco']; ?>"
                        data-imagem="<?php echo $produto['imagem']; ?>"
                    >
                        <div class="flex items-center justify-between gap-4 w-full">
                            <div class="flex flex-col flex-1">
                                <h3 class="font-bold text-white">
                                    <?php echo $produto['nome']; ?>
                                </h3>
                                <span class="text-sm text-zinc-400">
                                    R$ <?php echo $produto['preco']; ?>
                                </span>
                            </div>

                            <div class="w-24 h-24 bg-zinc-800 rounded-lg overflow-hidden shrink-0">
                                <img
                                    src="../../assets/img/produtos/<?php echo $produto['imagem']; ?>"
                                    alt="Foto do <?php echo $produto['nome']; ?>"
                                    class="w-full h-full object-cover"
                                >
                            </div>
                        </div>

                        <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'admin'): ?>
                            <div class="border-t border-zinc-800 pt-2 w-full mt-2">
                                <?php include "../admin/gerenciarProduto.php"; ?>
                            </div>
                        <?php endif; ?>
                        
                    </div> 

                    <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'admin'): ?>
                        <?php include "../admin/modalEdicaoProduto.php"; ?>
                    <?php endif; ?>

                <?php endforeach; ?>

                <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'admin'): ?>
                    <?php include "../admin/addProduto.php"; ?>
                    <?php include "../admin/modalNovoProduto.php"; ?>
                <?php endif; ?>

                </div>

            <?php endif; ?>

        </section>

    <?php endforeach; ?>

</main>

<?php include "cardProduto.php"; ?>
<?php include "../../templates/footer.php" ?>

<script src="../../assets/js/modalProduto.js" defer></script>
<script src="../../assets/js/buscaPratos.js" defer></script>
<script src="../../assets/js/modalEdicaoProduto.js" defer></script>
<script src="../../assets/js/modalAddProduto.js" defer></script>