<?php
    include "../../templates/header.php";
    include "../../templates/navbar.php"; // tem session_start()

    require_once "../../models/Categoria.php";
    require_once "../../models/Produto.php";

    $listaCategorias = Categoria::exibirCategorias();
    $produtosFavoritos = Produto::buscarFavoritosDoUsuario($_SESSION['usuario_id']);
    $idsFavoritados = array_column($produtosFavoritos, 'id');
?>

<main class="w-full p-24">

    <?php if (!empty($produtosFavoritos)): ?>
        <section">
            <div class="flex items-center gap-2">
                <h2 class="text-3xl font-bold text-zinc-100 border-l-4 border-red-600 pl-3 mb-6">
                    Seus Favoritos
                </h2>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-500 animate-pulse mb-4">
                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="grid grid-cols-4 gap-5 mb-12">
                <?php foreach ($produtosFavoritos as $produto): ?>
                    <?php $isFavorito = in_array($produto['id'], $idsFavoritados); ?>

                    <div
                        class="abrirCardProduto bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex items-center gap-4 hover:border-zinc-700 relative transition-all"
                        data-id="<?php echo $produto['id']; ?>"
                        data-nome="<?php echo $produto['nome']; ?>"
                        data-descricao="<?php echo $produto['descricao']; ?>"
                        data-preco="<?php echo $produto['preco']; ?>"
                        data-imagem="<?php echo $produto['imagem']; ?>"
                    >

                        <button 
                            class="favoritar-btn absolute top-3 left-3 z-20 text-zinc-600 hover:text-amber-500 transition-colors p-1"
                            data-produto-id="<?php echo $produto['id']; ?>"
                            title="<?php echo $isFavorito ? 'Remover dos favoritos' : 'Favoritar produto'; ?>"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 32 32" 
                                fill="<?php echo $isFavorito ? 'currentColor' : 'none'; ?>" 
                                stroke="currentColor" 
                                stroke-width="1.5" 
                                class="w-6 h-6 <?php echo $isFavorito ? 'text-amber-500' : 'text-zinc-500 hover:text-amber-400'; ?> transition-all duration-200 transform active:scale-75">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />                               
                            </svg>
                        </button>

                        <div class="flex flex-col flex-1 pt-8">
                            <h3 class="font-bold text-zinc-100 group-hover:text-red-500 transition-colors">
                                <?php echo $produto['nome']; ?>
                            </h3>

                            <span class="text-sm text-zinc-400 mt-1">
                                R$ <?php echo $produto['preco']; ?>
                            </span>
                        </div>

                        <div class="w-24 h-24 bg-zinc-800 rounded-lg overflow-hidden shrink-0 border border-zinc-700/50">
                            <img
                                src="../../assets/img/produtos/<?php echo $produto['imagem']; ?>"
                                alt="Foto do <?php echo $produto['nome']; ?>"
                                class="w-full h-full object-cover"
                            >
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
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
                        <?php $isFavorito = in_array($produto['id'], $idsFavoritados); ?>

                        <div
                            class="abrirCardProduto bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex items-center gap-4 hover:border-zinc-700 relative transition-all"
                            data-id="<?php echo $produto['id']; ?>"
                            data-nome="<?php echo $produto['nome']; ?>"
                            data-descricao="<?php echo $produto['descricao']; ?>"
                            data-preco="<?php echo $produto['preco']; ?>"
                            data-imagem="<?php echo $produto['imagem']; ?>"
                        >

                            <button 
                                class="favoritar-btn absolute top-3 left-3 z-20 text-zinc-600 hover:text-amber-500 transition-colors p-1"
                                data-produto-id="<?php echo $produto['id']; ?>"
                                title="<?php echo $isFavorito ? 'Remover dos favoritos' : 'Favoritar produto'; ?>"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 32 32" 
                                    fill="<?php echo $isFavorito ? 'currentColor' : 'none'; ?>" 
                                    stroke="currentColor" 
                                    stroke-width="1.5" 
                                    class="w-6 h-6 <?php echo $isFavorito ? 'text-amber-500' : 'text-zinc-500 hover:text-amber-400'; ?> transition-all duration-200 transform active:scale-75">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />                               
                                </svg>
                            </button>

                            <div class="flex flex-col flex-1 pt-8">
                                <h3 class="font-bold text-zinc-100 group-hover:text-red-500 transition-colors">
                                    <?php echo $produto['nome']; ?>
                                </h3>

                                <span class="text-sm text-zinc-400 mt-1">
                                    R$ <?php echo $produto['preco']; ?>
                                </span>
                            </div>

                            <div class="w-24 h-24 bg-zinc-800 rounded-lg overflow-hidden shrink-0 border border-zinc-700/50">
                                <img
                                    src="../../assets/img/produtos/<?php echo $produto['imagem']; ?>"
                                    alt="Foto do <?php echo $produto['nome']; ?>"
                                    class="w-full h-full object-cover"
                                >
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </section>

    <?php endforeach; ?>

    <section class="mt-24 max-w-6xl mx-auto bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-2xl flex flex-col md:flex-row gap-8">
        <div class="flex-1 space-y-4">
            <h2 class="text-3xl font-bold text-zinc-100 border-l-4 border-red-600 pl-3">
                Venha nos Visitar
            </h2>
            <p class="text-zinc-400 text-sm leading-relaxed">
                Quer saborear nossos pratos direto no restaurante ou prefere retirar seu pedido pessoalmente? Clique no mapa abaixo para abrir a rota ideal e navegar até nós usando o Google Maps!
            </p>
            <div class="pt-2">
                <a href="https://maps.google.com/?daddr=Hikari+Restaurante,+R.+Rui+Barbosa,+1625+-+Centro,+Guaíra+-PR,+85980-000" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    class="flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-semibold px-2 py-3 rounded-xl transition-all duration-200 shadow-md shadow-red-950/30 gap-2 text-sm transform hover:scale-105 w-full md:max-w-[240px]">
        
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.8" 
                        stroke="currentColor" 
                        class="w-5 h-5 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    
                    <span class="whitespace-nowrap">Traçar Rota</span>
                </a>
            </div>
        </div>

        <div class="w-full md:w-[450px] shrink-0">
            <a href="https://maps.google.com/?daddr=Hikari+Restaurante,+R.+Rui+Barbosa,+1625+-+Centro,+Guaíra+-PR,+85980-000" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="block relative group overflow-hidden rounded-xl border border-zinc-700 shadow-lg">
                
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3642.4718123824796!2d-54.256230788680455!3d-24.084897978353762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f4afe388142c9b%3A0x71b922a89e14311a!2sHikari%20Restaurante!5e0!3m2!1spt-BR!2sbr!4v1780616971647!5m2!1spt-BR!2sbr" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </a>
        </div>
    </section>

</main>

<?php include "cardProduto.php"; ?>
<?php include "../../templates/footer.php" ?>

<script src="../../assets/js/modalProduto.js" defer></script>
<script src="../../assets/js/buscaPratos.js" defer></script>
<script src="../../assets/js/impedeModal.js" defer></script>