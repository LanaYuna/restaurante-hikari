document.addEventListener('DOMContentLoaded', () => {

    const cardsProdutos = document.querySelectorAll(".abrirCardProduto"); 
    const modalProduto = document.getElementById("modalProduto");
    const fecharModalProduto = document.getElementById("fecharModalProduto");

    const modalId = document.getElementById('modalId');   
    const modalNome = document.getElementById('modalNome');
    const modalDescricao = document.getElementById('modalDescricao');
    const modalPreco = document.getElementById('modalPreco');
    const modalImagem = document.getElementById('modalImagem');


    cardsProdutos.forEach(card => {
        card.addEventListener('click', () => {
 
            const id = card.dataset.id;
            const nome = card.dataset.nome;
            const descricao = card.dataset.descricao;
            const preco = card.dataset.preco;
            const imagem = card.dataset.imagem;

            if(modalNome) modalNome.textContent = nome;
            if(modalDescricao) modalDescricao.textContent = descricao;
            if(modalPreco) modalPreco.textContent = `R$ ${preco}`;
            if(modalImagem) modalImagem.src = `../../assets/img/produtos/${imagem}`;
            if(modalId) modalId.value = id;

            if(modalProduto) {
                modalProduto.classList.remove('hidden');
                modalProduto.classList.add('flex');
            }

        });
    });

    if(fecharModalProduto) {
        fecharModalProduto.addEventListener('click', () => {
            modalProduto.classList.remove('flex');
            modalProduto.classList.add('hidden');
        })
    }
    
});