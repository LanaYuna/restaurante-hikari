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

            <div class="flex flex-col gap-4 mt-8">

                <button
                    type="button"
                    id="abrirModalEdicao"
                    class="flex-1 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl transition"
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

                <form action="../../controllers/EnderecoController.php" METHOD="POST" >
                    <button
                        class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl transition"
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
            </div>

        <?php endif; ?>

    </div>
</div>
