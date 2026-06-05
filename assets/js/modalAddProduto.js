document.addEventListener('DOMContentLoaded', () => {
    const botoesAbrir = document.querySelectorAll('.abrirModalNovoProduto');
    const botoesFechar = document.querySelectorAll('.fecharModalNovoProduto');

    botoesAbrir.forEach(botao => {
        botao.addEventListener('click', () => {
            const categoriaId = botao.dataset.categoriaId;
            const modalAlvo = document.getElementById(`modalNovoProduto-${categoriaId}`);
            
            if (modalAlvo) {
                modalAlvo.classList.remove('hidden');
                modalAlvo.classList.add('flex');
            }
        });
    });

    botoesFechar.forEach(botao => {
        botao.addEventListener('click', () => {
            const categoriaId = botao.dataset.categoriaId;
            const modalAlvo = document.getElementById(`modalNovoProduto-${categoriaId}`);
            
            if (modalAlvo) {
                modalAlvo.classList.remove('flex');
                modalAlvo.classList.add('hidden');
            }
        });
    });
});