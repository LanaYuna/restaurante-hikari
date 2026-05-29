<?php
    include "../../templates/header.php";
    include "../../templates/navbar.php";

    require_once "../../models/Categoria.php";
    require_once "../../models/Produto.php";

    $listaCategorias = Categoria::exibirCategorias();
?>

<main class="w-full p-12">

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
                
                <div class="flex gap-6 ">

                    <?php foreach ($produtosDaCategoria as $produto): ?>
                        <div class="bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex flex-col gap-4 hover:border-zinc-700 transition-all">

                           <div class="w-24 h-24 bg-zinc-800 rounded-lg overflow-hidden shrink-0">
                                <img src="../../assets/img/produtos/<?php echo $produto['imagem']; ?>" 
                                alt="Foto do <?php echo $produto['nome'];?>"
                                class="w-full h-full object-cover">
                            </div>

                            <div class="flex-1 flex flex-col justify-between">
                                <h3 class="font-bold">
                                    <?php echo $produto['nome']; ?>
                                </h3>
                                <span class="text-sm">
                                    R$<?php echo $produto['preco']; ?>
                                </span>
                            </div>

                         

                        </div>
                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </section>

    <?php endforeach; ?>

</main>

<?php 
    include "../../templates/footer.php"
?>