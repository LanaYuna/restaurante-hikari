<?php include "../../templates/header.php" ?>
<body>
    <div class="bg-zinc-900 p-8 rounded-2xl shadow-2xl w-full max-w-md">

        <form action="../../controllers/AuthController.php" method="POST" class="flex flex-col gap-4">

            <h1 class="text-center font-bold">
                Login
            </h1>

            <label class="block mb-2" text-sm>
                Email
            </label>

            <input 
                type="email" 
                name="email"
                required
                class="w-full p-3 rounded-lg bg-zinc-800 border border-zinc-700 focus:outline-none focus:border-red-500"
            >

            <label class="block mb-2 text-sm">
                Senha
            </label>

            <input 
                type="password"
                name="senha"
                required
                class="w-full p-3 rounded-lg bg-zinc-800 border border-zinc-700 focus:outline-none focus:border-red-500"
            >

            <button
                type="submit"
                name="acao"
                value="logar"
                class="bg-red-500 hover:bg-red-600 transition p-3 rounded-lg font-semibold mt-4""
            >
                Logar
            </button>

        </form>

    </div>
<?php include "../../templates/footer.php" ?>