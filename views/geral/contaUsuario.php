<?php 
session_start();

include "../../templates/header.php";
require_once "../../models/Usuario.php";
require_once "../../models/Pedido.php";

$usuario = Usuario::buscarPorId($_SESSION['usuario_id']);
$pedidos = Pedido::exibirPedidos($_SESSION['usuario_id']);

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
                value="<?php echo $usuario["nome"]; ?>"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <input
                type="email"
                name="email"
                value="<?php echo $usuario["email"]; ?>"
                class="bg-zinc-800 p-3 rounded-lg"
            >

            <input
                type="text"
                name="telefone"
                value="<?php echo $usuario["telefone"]; ?>"
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
        id="historico"
        class="bg-zinc-900 p-8 rounded-xl border border-zinc-800"
    >

        <h2 class="text-2xl font-bold mb-6">
            Histórico de Pedidos
        </h2>

        <div class="flex flex-col gap-4">

            <?php if(empty($pedidos)): ?>

                <p class="text-zinc-400">
                    Você ainda não realizou nenhum pedido.
                </p>

            <?php else: ?>

                <?php foreach ($pedidos as $pedido): ?>

                    <div class="bg-zinc-800 p-5 rounded-lg border border-zinc-700 hover:border-red-600 transition">

                        <div class="flex justify-between items-center mb-3">

                            <h3 class="font-bold text-lg text-white">
                                Pedido #<?= $pedido['id'] ?>
                            </h3>

                            <span class="text-sm text-zinc-400">
                                <?= date('d/m/Y H:i', strtotime($pedido['data_pedido'])) ?>
                            </span>

                        </div>

                        <div class="grid grid-cols-2 gap-3 text-sm">

                            <div>
                                <span class="text-zinc-400">
                                    Total:
                                </span>

                                <p class="font-semibold text-green-500">
                                    R$ <?= number_format($pedido['total'], 2, ',', '.') ?>
                                </p>
                            </div>

                            <div>
                                <span class="text-zinc-400">
                                    Pagamento:
                                </span>

                                <p class="font-semibold text-white">
                                    <?= ucfirst($pedido['pagamento']) ?>
                                </p>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

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
                    onclick="return confirm('Tem certeza que deseja apagar sua conta?')"
                    class="bg-red-600 p-3 rounded-lg hover:bg-red-700"
                >
                    Apagar conta
                </button>

            </div>

        </form>
</main>

<?php include "../../templates/footer.php"  ?>