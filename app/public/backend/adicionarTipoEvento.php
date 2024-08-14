<?php
include_once('./conexao.php');

// Verificando se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Armazenando o nome da condicionante em uma variável
    $nm_tipo_evento = $_POST['adicionarTipoEvento'];

    // Armazenando pontuação em uma variável
    $vl_pontuacao_conselheiro = $_POST['vl_pontuacao_conselheiro'];

    // Consulta preparada para inserir um novo registro na tabela "conselheiro" com o nome fornecido
    $sql_insert_evento = 'INSERT INTO tipo_evento (nm_tipo_evento, vl_pontuacao_conselheiro) VALUES (?, ?)';

    // Preparando a consulta com o objeto PDO e armazenando em uma variável
    $stmt_insert_evento = $pdo->prepare($sql_insert_evento);

    // Executando a consulta preparada com o nome fornecido
    $stmt_insert_evento->execute([$nm_tipo_evento, $vl_pontuacao_conselheiro]);

    // Redirecionando o usuário de volta para a página anterior após a conclusão da operação
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();


    // Verificando se o campo "adicionarEvento" está preenchido
    if (!empty($_POST['adicionarTipoEvento'])) {
        // Se os campos "nomeCondicionante e pontuacao" estiverem preenchidos, faça o que precisa ser feito aqui
        // ...

    } else {
        // Se o campo "adicionarEvento" não estiver preenchido, exibe uma mensagem de erro e redireciona o usuário de volta para a página anterior
        echo 'Erro ao inserir no banco';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }
}
