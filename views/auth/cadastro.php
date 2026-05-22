<?php
session_start();
?> 

<?php include '../../templates/header.php'; ?>

    <div class="bg-zinc-900 p-8 rounded-2xl shadow-2xl w-full max-w-md">

        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold mb-2 text-red-500">
                Hikari
            </h1>

            <p class="text-zinc-400">
                Cadastro
            </p>

        </div>

        <form action="../../controllers/AuthController.php" method="POST" class="flex flex-col gap-4">


            <div>

                <label class="block mb-2 text-sm">
                    Nome
                </label>

                <input
                    type="text"
                    name="nome"
                    required
                    class="w-full p-3 rounded-lg bg-zinc-800 border border-zinc-700 focus:outline-none focus:border-red-500"
                >
                

            </div>

            <div>

                <label class="block mb-2 text-sm">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    required
                    class="w-full p-3 rounded-lg bg-zinc-800 border border-zinc-700 focus:outline-none focus:border-red-500"
                >

            </div>

            <div>

                <label class="block mb-2 text-sm">
                    Telefone
                </label>

                <input
                    type="text"
                    name="telefone"
                    required
                    class="w-full p-3 rounded-lg bg-zinc-800 border border-zinc-700 focus:outline-none focus:border-red-500"
                >

            </div>

            <div>

                <label class="block mb-2 text-sm">
                    Senha
                </label>

                <input
                    type="password"
                    name="senha"
                    required
                    class="w-full p-3 rounded-lg bg-zinc-800 border border-zinc-700 focus:outline-none focus:border-red-500"
                >

            </div>

            <button
                type="submit"
                name="acao"
                value="cadastrar"
                class="bg-red-500 hover:bg-red-600 transition p-3 rounded-lg font-semibold mt-4 "
            >
                Criar conta
            </button>

        </form>

        <div class="text-center mt-6">

            <p class="text-zinc-400 text-sm">
                Já possui conta?
            </p>

            <a
                href="login.php"
                class="text-red-500 hover:underline"
            >
                Fazer login
            </a>

        </div>

    </div>

<?php include "../../templates/footer.php"?>