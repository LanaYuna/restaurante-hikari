const modalEndereco = document.getElementById('modalEndereco');
const btnAbrir = document.getElementById('abrirModalEndereco');
const btnFechar = document.getElementById('fecharModalEndereco');

const modalCadastro = document.getElementById('modalCadastroEndereco');
const btnAbrirCadastro = document.getElementById('abrirModalCadastro');
const btnFecharCadastro = document.getElementById('fecharModalCadastro');

btnAbrir.addEventListener('click', () => {
    modalEndereco.classList.remove('hidden');
    modalEndereco.classList.add('flex');
})

btnFechar.addEventListener('click', () => {
    modalEndereco.classList.add('hidden');
    modalEndereco.classList.remove('flex');
})

btnAbrirCadastro.addEventListener('click', () => {
    modalCadastro.classList.add('flex');
    modalCadastro.classList.remove('hidden');
    
})

btnFecharCadastro.addEventListener('click', () => {
    modalCadastro.classList.remove('flex');
    modalCadastro.classList.add('hidden');
})

