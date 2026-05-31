const campoBusca = document.getElementById("buscaPratos");
const cardsProdutos = document.querySelectorAll(".abrirCardProduto");

campoBusca.addEventListener("input", () => {

    const termo = campoBusca.value.toLowerCase().trim();

    cardsProdutos.forEach(card => {

        const nomeProduto = card.dataset.nome.toLowerCase();

        if(nomeProduto.includes(termo)){
            card.style.display = "flex";
        } else {
            card.style.display = "none";
        }

    });

});