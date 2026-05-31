document.addEventListener('DOMContentLoaded', () => {
    
    const modalEndereco = document.getElementById('modalEndereco');
    const btnAbrir = document.getElementById('abrirModalEndereco');
    const btnFechar = document.getElementById('fecharModalEndereco');

    const modalCadastro = document.getElementById('modalCadastroEndereco');
    const btnAbrirCadastro = document.getElementById('abrirModalCadastro');
    const btnFecharCadastro = document.getElementById('fecharModalCadastro');

    const btnAbrirEdicao = document.getElementById("abrirModalEdicao");
    const modalEdicao = document.getElementById("modalEdicaoEndereco");
    const btnFecharEdicao = document.getElementById("fecharModalEdicao");


    if (btnAbrir) {
        btnAbrir.addEventListener('click', () => {
            modalEndereco.classList.remove('hidden');
            modalEndereco.classList.add('flex');
        });
    }

    if (btnFechar) {
        btnFechar.addEventListener('click', () => {
            modalEndereco.classList.add('hidden');
            modalEndereco.classList.remove('flex');
        });
    }

    if (btnAbrirCadastro) {
        btnAbrirCadastro.addEventListener('click', () => {
            modalCadastro.classList.add('flex');
            modalCadastro.classList.remove('hidden');
        });
    }

    if (btnFecharCadastro) {
        btnFecharCadastro.addEventListener('click', () => {
            modalCadastro.classList.remove('flex');
            modalCadastro.classList.add('hidden');
        });
    }

    if (btnAbrirEdicao) {
        btnAbrirEdicao.addEventListener('click', () => {
            console.log('oi'); // Agora vai disparar!
            modalEdicao.classList.add('flex');
            modalEdicao.classList.remove('hidden');
        });
    }

    if (btnFecharEdicao) {
        btnFecharEdicao.addEventListener('click', () => {
            modalEdicao.classList.add('hidden');
            modalEdicao.classList.remove('flex');
        });
    }
});