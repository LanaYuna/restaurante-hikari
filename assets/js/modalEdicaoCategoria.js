document.addEventListener('DOMContentLoaded', () => {

    const botoesAbrirEdicao = document.querySelectorAll('.abrirModalEdicaoCategoria');
    const botoesFecharEdicao = document.querySelectorAll('.fecharModalEdicaoCategoria');

    botoesAbrirEdicao.forEach(botao => {

            botao.addEventListener('click', () => {

                const id = botao.dataset.categoria;

                const modal = document.getElementById(
                    `modalEdicaoCategoria-${id}`
                );

                modal.classList.remove('hidden');
                modal.classList.add('flex');

            });

    });

    botoesFecharEdicao.forEach(botao => {

            botao.addEventListener('click', () => {

                const id = botao.dataset.categoria;

                const modal = document.getElementById(
                    `modalEdicaoCategoria-${id}`
                );

                modal.classList.remove('flex');
                modal.classList.add('hidden');

            });

    });

    
});