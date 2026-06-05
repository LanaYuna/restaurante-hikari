<?php

session_start();
require_once "../models/Produto.php";

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['error' => 'Não autorizado']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents("php://input"), true);
    $produtoId = isset($dados['produto_id']) ? (int)$dados['produto_id'] : null;

    if ($produtoId) {
        $resultado = Produto::favoritarOuDesfavoritar($_SESSION['usuario_id'], $produtoId);
        echo json_encode($resultado);
        exit;
    }
}

echo json_encode(['error' => 'Requisição inválida']);