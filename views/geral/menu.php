<?php
    include "../../templates/header.php";
    include "../../templates/navbar.php";

    require_once "../../models/Categoria.php";
    require_once "../../models/Produto.php";

    $listaCategorias = Categoria::exibirCategorias();
?>

<main class="max-w-6xl mx-auto px-6 py-8 flex flex-col items-start">

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
                
                <div>

                    <?php foreach ($produtosDaCategoria as $produto): ?>
                        <div>
                            <div>
                                <h3>
                                    <?php echo $produto['nome']; ?>
                                </h3>
                                <span class="text-sm">
                                    <?php echo $produto['preco']; ?>
                                </span>
                            </div>

                            <div>
                                <img src="/assets/img/produtos/<?php echo $produto['imagem']; ?>" 
                                alt="Foto do <?php echo $produto['nome'];?>"
                                >
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