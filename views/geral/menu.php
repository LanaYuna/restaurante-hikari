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

    <?php if (!empty($produtosFavoritos)): ?>
        <section>
            <div class="flex items-center gap-2">
                <h2 class="text-3xl font-bold text-zinc-100 border-l-4 border-red-600 pl-3 mb-6">
                    Seus Favoritos
                </h2>
            </div>

            <div class="grid grid-cols-4 gap-5 mb-12">
                <?php foreach ($produtosFavoritos as $produto): ?>
                    <?php $isFavorito = in_array($produto['id'], $idsFavoritados); ?>

                    <div
                        class="abrirCardProduto bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex items-center gap-4 hover:border-zinc-700 relative group cursor-pointer transition-all"
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
                
                <div class="grid grid-cols-4 gap-5 mb-12">
                <?php foreach ($produtosDaCategoria as $produto): ?>
                    <?php $isFavorito = in_array($produto['id'], $idsFavoritados); ?>

                    <div
                        class="abrirCardProduto bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex items-center gap-4 hover:border-zinc-700 relative group cursor-pointer transition-all"
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

    <section class="mt-24 max-w-6xl mx-auto bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-2xl flex flex-col md:flex-row gap-8">  
        <div class="flex-1 flex flex-col gap-6">
        
            <div class="space-y-4">
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
            
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <span class="whitespace-nowrap">Traçar Rota</span>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-start gap-4 pt-4 border-t border-zinc-800/60 mt-auto">
                <span class="text-zinc-500 text-[11px] font-medium tracking-wide uppercase whitespace-nowrap">Nossas redes:</span>
                
                <div class="flex items-center gap-2">
                    <a href="https://www.instagram.com/rodrigohikarirestaurante/" target="_blank" rel="noopener noreferrer" title="Siga-nos no Instagram"
                        class="p-2.5 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 hover:text-pink-500 rounded-lg border border-zinc-700/40 transition-all flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.444-.048-3.298c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                        </svg>
                    </a>

                    <a href="https://www.facebook.com/HikariRestaurante/?locale=pt_BR" target="_blank" rel="noopener noreferrer" title="Curta nossa página no Facebook"
                        class="p-2.5 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 hover:text-blue-500 rounded-lg border border-zinc-700/40 transition-all flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0 0 3.603 0 8.049c0 4.004 2.925 7.346 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>

                    <a href="https://wa.me/554497376856?text=Olá!%20Gostaria%20de%20fazer%20um%20pedido." 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        title="Chame no WhatsApp"
                        class="p-2.5 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 hover:text-emerald-500 rounded-lg border border-zinc-700/40 transition-all flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg>
                     </a>
                </div>
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
<script src="../../assets/js/modalEdicaoProduto.js" defer></script>
<script src="../../assets/js/modalAddProduto.js" defer></script>
