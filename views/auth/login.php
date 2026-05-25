<?php 
include "../../templates/header.php";
// Captura se há o parâmetro de erro de login ou de campos vazios na URL
$exibirErro = false;
$mensagemErro = "";

if (isset($_GET['login']) && $_GET['login'] === 'erro') {
    $exibirErro = true;
    $mensagemErro = "E-mail ou senha incorretos.";
} elseif (isset($_GET['erro']) && $_GET['erro'] === 'campos_vazios') {
    $exibirErro = true;
    $mensagemErro = "Por favor, preencha todos os campos obrigatórios.";
}
?>

<?php if ($exibirErro): ?>

    <div class="bg-red-900 text-white p-3 rounded-md mb-4 text-center font-medium text-sm shadow-md ">
        <?php echo $mensagemErro; ?>
    </div>
<?php endif; ?>

    <div class="bg-zinc-900 p-8 rounded-2xl shadow-2xl w-full max-w-md">
   
        <form action="../../controllers/AuthController.php" method="POST" class="flex flex-col gap-4 ">

            <h1 class="text-center font-bold">
                Login
            </h1>

            <label class="block mb-2 text-sm">
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

        <div class="text-center mt-6">

            <p class="text-sm text-zinc-400">
                Não possui cadastro?
            </p>

            <a 
                href="cadastro.php"
                class="text-red-500 hover:underline"
            >
                Fazer cadastro
            </a>
        </div>

    </div>
<?php include "../../templates/footer.php" ?>