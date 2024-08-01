<?php
// Incluir o arquivo de conexão com o banco de dados
include './conexao.php';

// Verifica se o ID do conselheiro foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_conselheiro = $_POST['id_conselheiro'];
    $stmt = $pdo->prepare("UPDATE conselheiro SET excluir = 0 WHERE id_conselheiro = ?");
    if ($stmt->execute([$id_conselheiro])) {
        // conselheiro ativado com sucesso
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo 'Erro ao ativar conselheiro!';
        exit();
    }
}
