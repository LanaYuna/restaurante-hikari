<?php 
session_start();

include "../../templates/header.php";
require_once "../../models/Usuario.php";

$usuario = Usuario::buscarPorId($_SESSION['usuario_id']);

?>

<main class="max-w-5xl mx-auto p-8 flex flex-col gap-8">

    <a href="menu.php" class="font-bold">
        Voltar para o menu

    </a>

    <section
        id="informacoes"
        class="bg-zinc-900 p-8 rounded-xl border border-zinc-800"
    >

        <h2 class="text-2xl font-bold mb-6">
            Informações da Conta
        </h2>

        <div class="space-y-4">

            <p>
                <span>Nome:</span>
                <?php echo $usuario["nome"]; ?>
            </p>

            <p>
                <span>Email:</span>
                <?php echo $usuario["email"]; ?>
            </p>

            <p>
                <span>Telefone:</span>
                <?php echo $usuario["telefone"]; ?>
            </p>

        </div>

    </section>

    <section
        id="editar"
        class="bg-zinc-900 p-8 rounded-xl border border-zinc-800"
    >

        <h2 class="text-2xl font-bold mb-6">
            Editar Dados
        </h2>

        <form
            action="../../controllers/UsuarioController.php"
            method="POST"
            class="flex flex-col gap-4"
        >

            <input
                type="text"
                name="nome"
                value="<?php echo $_SESSION["usuario_nome"]; ?>"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <input
                type="email"
                name="email"
                value="<?php echo $_SESSION["usuario_email"]; ?>"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <input
                type="text"
                name="telefone"
                value="<?php echo $_SESSION["usuario_telefone"]; ?>"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <button
                type="submit"
                name="acao"
                value="editar"
                class="bg-red-600 p-3 rounded-lg hover:bg-red-700"
            >
                Salvar Alterações
            </button>

        </form>

    </section>

    <section
        id="senha"
        class="bg-zinc-900 p-8 rounded-xl border border-zinc-800"
    >

        <h2 class="text-2xl font-bold mb-6">
            Alterar Senha
        </h2>

        <form
            action="../../controllers/UsuarioController.php"
            method="POST"
            class="flex flex-col gap-4"
        >

            <input
                type="password"
                name="senhaAtual"
                placeholder="Senha atual"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <input
                type="password"
                name="novaSenha"
                placeholder="Nova senha"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <button
                type="submit"
                name="acao"
                value="alterarSenha"
                class="bg-red-600 p-3 rounded-lg  hover:bg-red-700"
            >
                Alterar Senha
            </button>

        </form>

    </section>

    <section
        id="historico"
        class="bg-zinc-900 p-8 rounded-xl border border-zinc-800"
    >

        <h2 class="text-2xl font-bold mb-6">
            Histórico de Pedidos
        </h2>

        <div class="flex flex-col gap-4">

            <div class="bg-zinc-800 p-4 rounded-lg">
                <p>Pedido #12</p>
                <p>15/06/2026</p>
                <p>R$ 89,90</p>
                <p class="text-green-500">
                    Entregue
                </p>
            </div>

            <div class="bg-zinc-800 p-4 rounded-lg">
                <p>Pedido #15</p>
                <p>22/06/2026</p>
                <p>R$ 120,00</p>
                <p class="text-green-500">
                    Entregue
                </p>
            </div>

        </div>
    </section>

    <section
        id="apagar"
        class="bg-zinc-900 p-8 rounded-xl border border-zinc-800"
    >

        <h2 class="text-2xl font-bold mb-6">
            Apagar conta
        </h2>

        <form
            action="../../controllers/UsuarioController.php"
            method="POST"
            class="flex flex-col gap-4"
        >

            <div class="flex flex-col gap-4">

                <p> 
                    Atenção: Após a aprovação, essa ação não poderá ser revertida.
                </p>

                <button
                    type="submit"
                    name="acao"
                    value="apagar"
                    class="bg-red-600 p-3 rounded-lg hover:bg-red-700"
                >
                    Apagar conta
                </button>

            </div>

        </form>
</main>

<?php include "../../templates/footer.php"  ?>