<link rel="stylesheet" href="../css/conselheiros.css">
<link rel="stylesheet" href="../css/opcoes.css">
<link rel="stylesheet" href="../css/principal.css">
<link rel="stylesheet" href="../css/reset.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="btnadd-head">
    <div class="box">
        <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
        <input type="text" name="" class="box-pesquisa" placeholder="Pesquisar" id="campo-pesquisa">
   

    <!-- Botão para adicionar conselheiro -->

    <button id="openModal1" class="btn-adicionar br-button primary mr-3">Adicionar conselheiro</button>

    <button id="openModal5" class="btn-restaurar br-button secondary mr-3">Conselheiros desativados</button> 

</div>
</div>



<!-- Modal para exibir a lista de conselheiros desativados -->
<dialog id="modal5" class="modal">
    <div class="modal-content">
        <!-- <h2>Escolha um conselheiro desativado para ativar:</h2> -->
        <table id="tabela-ativos" style="width: 100%;">
            <thead>
                <tr class="head-tab">
                    <td style="
                    background: #124D81;
                    color: white;">Nome do Conselheiro</td>
                    <td
                        style="
                    background: #124D81;
                    color: white;">Restaurar Conselheiro</td>
                </tr>
            </thead>
            <tbody>
                <?php
                // Preparando a consulta
                $stmt = $pdo->prepare("SELECT id_conselheiro, nm_conselheiro FROM conselheiro WHERE excluir = 1 ORDER BY nm_conselheiro");

                // Executando a consulta
                $stmt->execute();

                // Obtendo os resultados
                $resultados = $stmt->fetchAll();

                // Iterando sobre os resultados para exibir na tabela
                foreach ($resultados as $resultado) {
                    echo "<tr>";
                    echo "<td>" . $resultado['nm_conselheiro'] . "</td>";
                    echo "<td class='campoativar'>";
                    echo "<button id='openModal10' class=' br-button primary mr-3' style='align-items: center; margin: 0px 0px 0px 16% !important;' 
                    data-id='" . $resultado['id_conselheiro'] . "'
                    data-nome='" . $resultado['nm_conselheiro'] . "' 
                    style='display: flex; margin: 0 27%; justify-content: center;'>Reativar</button>";
                    echo "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
        <button type="button" class=" br-button secondary mr-3" id="closeModal5">Fechar</button>
    </div>
</dialog>


<!-- Modal para adicionar conselheiro -->
<dialog id="modal1" class="modal modalacessar">
    <div class="modal-content">
        <form method="post" action="../backend/insert.php">
            <!-- <p>Deseja adicionar um novo conselheiro?</p> -->
            <input type="text" name="adicionarConselheiro" id="adicionarConselheiro" autocomplete="off" placeholder="NOME DO CONSELHEIRO">
            <br>
            <button type="submit" class="br-button primary mr-3 float-left">Adicionar</button>
            <button type="reset" id="closeModal1" class="br-button secondary mr-3 float-right">Fechar</button>
        </form>
    </div>
</dialog>
<!-- Tabela com os nomes dos conselheiros -->


<div class="container-table">
    <div style=" width: 65%;" class="tableOverflow">
        <table id="tabela-cadastro" style="width: 100%;">
            <thead>
                <tr class="cabecalho-tabela">
                    <th>Nome do Conselheiro</th>
                    <th>Acessar Conselheiro</th>
                    <th>Desativar Conselheiro</td>
                </tr>
            </thead>
            <tbody>
                <?php
                // Preparando a consulta
                $stmt = $pdo->prepare("SELECT id_conselheiro, nm_conselheiro, vl_pontuacao_conselheiro FROM conselheiro WHERE excluir = 0 ORDER BY nm_conselheiro");

                // Executando a consulta
                $stmt->execute();

                // Obtendo os resultados
                $resultados = $stmt->fetchAll();

                // Iterando sobre os resultados para exibir na tabela
                foreach ($resultados as $resultado) {
                    echo "<tr>";
                    echo "<td>" . $resultado['nm_conselheiro'] . "</td>";
                    echo "<td class='acessarDesativar'><button class='btn-acessar' data-id='" . $resultado['id_conselheiro'] . "'><i class='fa-regular fa-eye'></i></button></td>";
                    echo "<td class='campodesativar acessarDesativar'>
                    
                    <button id='openModal4' class='btn-desativarconselheiro danger btnremove' 
                            data-id='" . $resultado['id_conselheiro'] . "'
                            data-nome='" . $resultado['nm_conselheiro'] . "'><i class='fa-regular fa-trash-can'></i></button>
                    <input type='hidden' class='id-conselheiro' value='" . $resultado['id_conselheiro'] . "'>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Iterando novamente para criar os modais correspondentes a cada conselheiro
foreach ($resultados as $resultado) {
    echo "<dialog id='modal-acessar-" . $resultado['id_conselheiro'] . "' class='modal modalacessar'>";
    echo "<div class='modal-content'>";
    echo "<h1>" . $resultado['nm_conselheiro'] . "</h1>";

    echo "<p>Pontuação total: " . $resultado['vl_pontuacao_conselheiro'] . "</p>";
    echo "<button type='button' id='closeModal-" . $resultado['id_conselheiro'] . "' class='br-button secondary mr-3'>Fechar</button>";
    echo "</div>";
    echo "</dialog>";
}
?>


<!-- Modal para desativar conselheiro -->
<dialog id="modal-desativar" class="modal">
    <div class="modal-content">
        <h2>Você confirma esta exclusão?</h2>
        <p id="nome-conselheiro"></p>
        <form id="form-desativar" method="post" action="../backend/remove.php">
            <input type="hidden" name="conselheiro" id="conselheiro-desativar">
            <input type="hidden" name="id" id="id-conselheiro-desativar">
            <button type="submit" class="br-button primary mr-3">Confirmar</button>
            <button type="button" class="br-button secondary mr-3" id="closeModal4">Cancelar</button>
        </form>
    </div>
</dialog>

<!-- Modal para ativar conselheiro -->
<dialog id="modal10" class="modal">
    <div class="modal-content">
        <form method="post" action="../backend/restaurar.php">
            <input type="hidden" id="id-ativar" name="id-ativar" value="">
            <p>Deseja reativar o conselheiro abaixo?</p>
            <h2 id="ativarConselheiro"></h2>
            <br>
            <button type="submit" class="btn btn-primary">Reativar</button>
            <button type="button" id="closeModal10" class="btn btn-secondary float-right">Cancelar</button>
        </form>
    </div>
</dialog>


<!-- Script para abrir o modal de desativar conselheiro -->
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

    // Script para fechar o modal de desativar conselheiro
    var closeModal4 = document.getElementById('closeModal4');
    if (closeModal4) {
        closeModal4.addEventListener('click', function() {
            document.getElementById('modal-desativar').close();
        });
    }


    const btnAtivar = document.querySelectorAll('.btn-ativar');
    const modalAtivar = document.querySelector('#modal10');
    const closeModalAtivar = document.querySelector('#closeModal10');
    const idAtivar = document.querySelector('#id-ativar');

    btnAtivar.forEach((btn) => {
        btn.addEventListener('click', () => {
            modalAtivar.showModal();
            idAtivar.value = btn.getAttribute('data-id');
            const nome = btn.getAttribute('data-nome');
            document.querySelector('#ativarConselheiro').innerHTML = nome;
        });
    });

    closeModalAtivar.addEventListener('click', () => {
        modalAtivar.close();
    });

    // quando o usuário digitar no campo de pesquisa, envie uma solicitação AJAX ao servidor
    $('#campo-pesquisa').on('input', function() {
        var nomePesquisado = $(this).val();
        $.ajax({
            url: '../backend/pesquisarConselheiro.php',
            method: 'POST',
            data: {
                nome: nomePesquisado
            },
            success: function(response) {
                // atualize a tabela com a nova lista de conselheiros
                $('#tabela-cadastro tbody').html(response);
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Seleciona todos os modais
        const modals = document.querySelectorAll('dialog[id^="modal-acessar-"]');

        // Itera sobre cada modal para adicionar o evento de fechar
        modals.forEach(modal => {
            // Seleciona o botão de fechar dentro do modal atual
            const closeButton = modal.querySelector('button[id^="closeModal-"]');

            // Adiciona o evento de clique ao botão de fechar
            closeButton.addEventListener('click', function() {
                modal.close();
            });
        });
    });


    // Adicionando o ouvinte de evento de clique para abrir o modal correspondente
    const btnAcessar = document.querySelectorAll('.btn-acessar');
    btnAcessar.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = btn.dataset.id;
            const modal = document.querySelector('#modal-acessar-' + id);
            if (modal) {
                modal.showModal();
            }
        });
    });
</script>