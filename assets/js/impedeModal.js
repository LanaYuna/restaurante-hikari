document.querySelectorAll('.favoritar-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        // Impede a abertura do modal ao clicar na estrela de favorito
        e.stopPropagation(); 
        
        const produtoId = this.getAttribute('data-produto-id');
        const svg = this.querySelector('svg');

        fetch('../../controllers/FavoritoController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ produto_id: produtoId })
        })
        .then(response => response.json()) // Converte para objeto JavaScript
        .then(data => {
            if (data.status === 'adicionado') {
                svg.setAttribute('fill', 'currentColor');
                svg.classList.remove('text-zinc-500', 'hover:text-amber-400');
                svg.classList.add('text-amber-500');
                
                this.setAttribute('title', 'Remover dos favoritos');
                location.reload();
            } else if (data.status === 'removido') {
                svg.setAttribute('fill', 'none');
                svg.classList.remove('text-amber-500');
                svg.classList.add('text-zinc-500', 'hover:text-amber-400');
                
                this.setAttribute('title', 'Favoritar produto');
                location.reload();
            } else if (data.error) {
                console.error('Erro retornado do servidor:', data.error);
            }
        })
        .catch(error => console.error('Erro na requisição de favoritos:', error));
    });
});