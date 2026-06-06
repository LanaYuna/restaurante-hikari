document.addEventListener('DOMContentLoaded', () => {
    const btnAbrir = document.getElementById('abrirModalNovaCategoria');
    const btnFechar = document.getElementById('fecharModalNovaCategoria');
    const modalAlvo = document.getElementById("modalNovaCategoria");

    if(btnAbrir){
        btnAbrir.addEventListener("click", () => {
            if (modalAlvo) {
                modalAlvo.classList.add('flex');
                modalAlvo.classList.remove('hidden');
            }
        })
    }

   if(btnFechar){
        btnFechar.addEventListener("click", () => {
            if (modalAlvo) {
                modalAlvo.classList.remove('flex');
                modalAlvo.classList.add('hidden');
            }
        })
    }
});