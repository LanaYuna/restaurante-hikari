document.querySelectorAll('.favoritar-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Impede a abertura do modal ao clicar na estrela de favorito
            e.stopPropagation(); 
            
            const produtoId = this.getAttribute('data-produto-id');
            
            alert('Produto ' + produtoId + ' favoritado/desfavoritado!');
        });
    });