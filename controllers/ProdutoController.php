<?php

require_once "../models/Produto.php";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    $acao = $_POST["acao"] ?? "";

    if($acao == "editar"){
        $id = $_POST['id'];
        $nome = trim($_POST['nome']);
        $descricao = trim($_POST['descricao']);
        $preco = trim($_POST['preco']);
        $imagem_atual = $_POST['imagemAtual']; 
     
        if (empty($nome) || empty($descricao) || empty($preco)) {
            header("Location: ../views/admin/produtos.php?erro=campos_vazios");
            exit();
        }

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
            
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $nome_imagem = uniqid() . "." . $extensao;
            
            $pasta_destino = "../assets/img/produtos/" . $nome_imagem;

            // Move o arquivo temporário para a pasta definitiva
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta_destino)) {
                // Se o upload deu certo, a nova imagem será salva no banco
                $imagem_final = $nome_imagem;
                
                // Opcional: Deletar a imagem antiga da pasta para não acumular lixo
                if (file_exists("../assets/img/produtos/" . $imagem_atual)) {
                    unlink("../assets/img/produtos/" . $imagem_atual);
                }
            } else {
                $imagem_final = $imagem_atual; // Se falhar o upload, mantém a atual
            }
        } else {
            // Se o usuário não escolheu nenhuma foto, mantém a atual
            $imagem_final = $imagem_atual;
        }

        // Chama o Model passando o nome correto da imagem
        $sucesso = Produto::editar($id, $nome, $descricao, $preco, $imagem_final);

        if ($sucesso) {
            header("Location: ../views/geral/menu.php?edicao=sucesso");
        } else {
            header("Location: ../views/geral/menu.php?edicao=erro");
        }
        exit();

    }

    if($acao == "apagar"){ 
        $produto_id = $_POST['produto_id'];

        $resultado = Produto::apagar($produto_id);

        if($resultado){

            header("Location: ../views/geral/menu.php?delecao=sucesso");
        } else {

            header("Location: ../views/geral/menu.php?delecao=erro");
        }

        die;

    }
    




    
};

?>