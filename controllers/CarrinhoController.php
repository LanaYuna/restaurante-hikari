<?php

session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    
    $acao = $_POST['acao'];

    if ($acao == 'adicionar') {
        $id = $_POST['produto_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $imagem = $_POST['imagem'];
        $quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 1; 

        // Se o produto já está no carrinho, apenas atualiza a quantidade
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;

        } else {
            // Se for um produto novo, adiciona no array
            $_SESSION['carrinho'][$id] = [
                'nome' => $nome,
                'preco' => $preco,
                'quantidade' => $quantidade,
                'imagem' => $imagem
            ];
        }
        
        header('Location: ../views/geral/menu.php');
        exit;
    }

    if ($acao == 'remover') {
        $id = $_POST['produto_id'];
        
        if (isset($_SESSION['carrinho'][$id])) {

            unset($_SESSION['carrinho'][$id]); 
        }
        
        header('Location: ../views/geral/carrinho.php');
        exit;
    }

    
    if ($acao == 'editar') {

        $id = $_POST['produto_id'];
        $quantidade = (int) $_POST['quantidade'];

        if (
            isset($_SESSION['carrinho'][$id]) &&
            $quantidade > 0
        ) {
            $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;
        }

        header('Location: ../views/geral/carrinho.php');
        exit;
    }
}