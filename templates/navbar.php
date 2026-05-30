<header class="w-full sticky top-0 z-50 bg-zinc-900 border-b border-zinc-800">
    <nav class="w-full max-w-[1440px] mx-auto flex items-center justify-between px-6 h-20 gap-12">

        <a href="#" class="shrink-0">
            <img src="assets/img/logo.png" alt="Logo do Hikari" class="h-10 w-auto object-contain">
        </a>

        <input
            type="search" 
            id="busca-pratos"
            placeholder="Busque por comida ou categoria..." 
            class="flex-1 max-w-xl bg-zinc-800 text-zinc-100 placeholder-zinc-500 px-5 py-2.5 rounded-full border border-zinc-700 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 text-sm transition-all"
        >

        <div class="flex items-center gap-8 shrink-0">

            <button id="abrirModalEndereco" class="text-zinc-400 hover:text-red-500 transition-colors hover:scale-105 duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <span>Seu endereço</span>
            </button>

            <button class="text-zinc-400 hover:text-red-500 transition-colors hover:scale-105 duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span>Seu perfil</span>
            </button>

            <button class="flex items-center gap-4 bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full font-medium shadow-md shadow-red-950/30 transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:scale-110 transition-transform">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <div class="flex flex-col text-left leading-tight border-l border-red-500 pl-3">
                    <span class="text-sm font-bold">R$ 0,00</span>
                    <span class="text-xs text-red-200">0 itens</span>
                </div>
            </button>

        </div>
    </nav>
</header>

<!-- MODAL ENDERECO -->
<div
    id="modalEndereco"
    class="hidden fixed inset-0 bg-black/70 z-[100] items-center justify-center p-4 backdrop-blur-sm"
>

    <div class="bg-zinc-900 w-full max-w-md rounded-2xl border border-zinc-700 p-6 shadow-2xl">

        <div class="flex items-center gap-4 justify-between mb-6 p-3">

            <h2 class="text-xl font-bold text-white ">
                Onde você quer receber seu pedido?
            </h2>

            <button
                id="fecharModalEndereco"
                class="text-zinc-400 hover:text-red-500 transition"
            >
                X
            </button>

        </div>

        <?php if(empty($enderecoUsuario)): ?>

            <p class="text-zinc-300 mb-6 text-sm italic text-center p-4">
                Nenhum endereço cadastrado.
            </p>

            <button
                id="abrirModalCadastro"
                class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl transition"
            >
                Cadastrar endereço
            </button>

        <?php else: ?>

            <div class="space-y-3">

                <p class="text-zinc-300">
                    <span class="font-semibold text-white">
                        Rua:
                    </span>

                    <?php echo $enderecoUsuario["rua"] ?>
                </p>

                <p class="text-zinc-300">
                    <span class="font-semibold text-white">
                        Número:
                    </span>

                    <?php echo $enderecoUsuario["numero"] ?>
                </p>

                <p class="text-zinc-300">
                    <span class="font-semibold text-white">
                        Complemento:
                    </span>

                    <?php echo $enderecoUsuario["complemento"] ?>
                </p>

            </div>

            <form action="../../controllers/EnderecoController.php" class="flex gap-4 mt-8">

                <button
                    class="flex-1 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl transition"
                    type="submit"
                    name="acao"
                    value="editar"
                >

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"
                        />

                    </svg>

                    Editar

                </button>

                <button
                    class="flex-1 flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl transition"
                    type="submit"
                    name="acao"
                    value="apagar"
                >

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.245-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0V4.875c0-1.036-.84-1.875-1.875-1.875h-3.75C9.84 3 9 3.84 9 4.875v.915m7.5 0a48.667 48.667 0 0 0-7.5 0"
                        />

                    </svg>

                    Apagar

                </button>

            </form>

        <?php endif; ?>

    </div>
</div>

<!-- MODAL CADASTRO -->
<div
    id="modalCadastroEndereco"
    class="hidden fixed inset-0 bg-black/60 z-[100] items-center justify-center px-4"
>

    <div class="bg-zinc-900 w-full max-w-md rounded-2xl border border-zinc-700 p-6">

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-xl font-bold text-white">
                Cadastrar endereço
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
    
<script src="../../assets/js/modal-endereco.js"></script>