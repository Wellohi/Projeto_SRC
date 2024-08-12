<?php

include_once('./conexao.php');

// obter o nome pesquisado do corpo da solicitação POST
$nomePesquisado = $_POST['nome'];

// preparar a consulta SQL para obter os conselheiros correspondentes
$stmt = $pdo->prepare("SELECT id_conselheiro, nm_conselheiro FROM conselheiro WHERE excluir = 0 AND nm_conselheiro LIKE :nm_conselheiro ORDER BY nm_conselheiro");

// vincular o valor do nome pesquisado ao parâmetro de consulta
$stmt->bindValue(':nm_conselheiro', '%' . $nomePesquisado . '%');

// executar a consulta
$stmt->execute();

// verificar se algum conselheiro foi encontrado
if ($stmt->rowCount() === 0) {
    echo "<tr><td colspan='3'>Conselheiro não encontrado.</td></tr>";
} else {
    foreach ($stmt as $resultado) {
        echo "<tr>";
        echo "<td>" . $resultado['nm_conselheiro'] . "</td>";
        echo "<td class='acessarDesativar'><button class='btn-acessar' data-id='" . $resultado['id_conselheiro'] . "'><i class='fa-solid fa-check'></i></button></td>";
        echo "<td class='campodesativar acessarDesativar'>
            <button id='openModal4' class='btn-desativarconselheiro danger btnremove' 
                    data-id='" . $resultado['id_conselheiro'] . "'
                    data-nome='" . $resultado['nm_conselheiro'] . "'><i class='fa-solid fa-xmark'></i></button>
            <input type='hidden' class='id-conselheiro' value='" . $resultado['id_conselheiro'] . "'>
            </td>";
        echo "</tr>";
    }
}

// Iterando novamente para criar os modais correspondentes a cada conselheiro
foreach ($stmt as $resultado) {
    echo "<dialog id='modal-acessar-" . $resultado['id_conselheiro'] . "' class='modal modalacessar'>";
    echo "<div class='modal-content'>";
    echo "<h1>" . $resultado['nm_conselheiro'] . "</h1>";
    echo "<p>Pontuação total: " . $resultado['vl_pontuacao_conselheiro'] . "</p>";
    echo "<button type='button' id='closeModal-" . $resultado['id_conselheiro'] . "' class='btn btn-secondary float-right'>Fechar</button>";
    echo "</div>";
    echo "</dialog>";
}
?>

<script>
    var btnRemove = document.getElementsByClassName('btnremove');
    for (var i = 0; i < btnRemove.length; i++) {
        btnRemove[i].addEventListener('click', function() {
            var idConselheiro = this.dataset.id;
            var nomeConselheiro = this.dataset.nome;
            document.getElementById('nome-conselheiro').textContent = nomeConselheiro;
            document.getElementById('conselheiro-desativar').value = nomeConselheiro;
            document.getElementById('id-conselheiro-desativar').value = idConselheiro; // novo
            document.getElementById('modal-desativar').showModal();
        });
    }

    var btnsAcessar = document.querySelectorAll('.btn-acessar');
    for (var i = 0; i < btnsAcessar.length; i++) {
        btnsAcessar[i].addEventListener('click', function() {
            var id_conselheiro = this.getAttribute('data-id'); // obtém o ID do resultado correspondente
            var modal = document.querySelector('#modal-acessar-' + id_conselheiro); // encontra o modal correspondente com base no ID
            modal.showModal(); // abre o modal
        });
    }
</script>
