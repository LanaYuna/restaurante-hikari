<div class="flex flex-col w-full gap-2">
    <button
        type="button"
        data-id="<?= $produto['id'] ?>" class="abrirModalEdicao w-full mb-2 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl transition"
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
                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a    4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"
            />

        </svg>

        Editar

    </button>

    <form action="../../controllers/ProdutoController.php" method="POST">
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


        <input
            type="hidden"
            name="produto_id"
            value="<?= $produto['id'] ?>"
        >

            Apagar

        </button>
    </form>
</div>