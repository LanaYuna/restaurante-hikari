document.addEventListener('DOMContentLoaded', () => {

    // Captura todos os botões de abrir edição da página
    const botoesAbrirEdicao = document.querySelectorAll('.abrirModalEdicao');
    // Captura todos os botões de fechar dos modais
    const botoesFecharEdicao = document.querySelectorAll('.fecharModalEdicao');

    // Manipula a abertura do modal correto com base no ID do produto
    botoesAbrirEdicao.forEach(botao => {
        botao.addEventListener('click', (e) => {
            e.stopPropagation(); // Evita disparar cliques em elementos pai (como o card de detalhes)
            const produtoId = botao.dataset.id;
            const modalAlvo = document.getElementById(`modalEdicaoProduto-${produtoId}`);
            
            if (modalAlvo) {
                modalAlvo.classList.remove('hidden');
                modalAlvo.classList.add('flex');
            }
        });
    });

    // Manipula o fechamento do modal correto
    botoesFecharEdicao.forEach(botao => {
        botao.addEventListener('click', () => {
            const produtoId = botao.dataset.id;
            const modalAlvo = document.getElementById(`modalEdicaoProduto-${produtoId}`);
            
            if (modalAlvo) {
                modalAlvo.classList.remove('flex');
                modalAlvo.classList.add('hidden');
            }
        });
    });
});