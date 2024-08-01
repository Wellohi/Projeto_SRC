<?php
include_once('./conexao.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nm_plenario = $_POST['nm_plenario'];
    $dt_plenario = $_POST['dt_plenario'];
    $qt_vagas = $_POST['qt_vagas'];
    $tp_plenario = $_POST['tp_plenario'];
    $nm_condicionante = $_POST['nm_condicionante'];
    $sg_estado_uf = $_POST['sg_estado_uf'];

    $insercao = "INSERT INTO plenario (nm_plenario, dt_plenario, qt_vagas, tp_plenario, nm_condicionante, sg_estado_uf) VALUES (?, ?, ?, ?, ?, ?)";
    $insercao = $pdo->prepare($insercao);
    try {
        $insercao->execute([$nm_plenario, $dt_plenario, $qt_vagas, $tp_plenario, $nm_condicionante, $sg_estado_uf]);
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    } catch (PDOException $e) {
        echo 'Erro ao inserir no banco: ' . $e->getMessage();
        exit();
    }

    if (!empty($_POST['adicionarConselheiro'])) {
        // Se o campo "adicionarConselheiro" estiver preenchido, faça o que precisa ser feito aqui
        // ...
    } else {
        // Se o campo "adicionarConselheiro" não estiver preenchido, exibe uma mensagem de erro específica
        echo 'O campo "adicionarConselheiro" é obrigatório';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }
}
