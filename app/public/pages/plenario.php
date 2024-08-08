<link rel="stylesheet" href="../css/plenario.css">
<!-- <div class="divisao">
    <input type="text" id="campoDeBuscaPlenario" onkeyup="buscarNoCampoPlenario()" placeholder="Digite o Nome Do Plenario...">
</div> -->

<button class="btn success" id="openModal11" style="position: relative;
    margin: 0px 0px 0px 86%; max-width: 14em !important;">Cadastrar plenaria</button>



<!-- <div id="container-cards-plenario" class="container-cards-plenario">

    <div class="card-plenario">
        <span>Nome Do Plenário:</span>
        <input type="text" value="B" disabled="disabled" class="info-eventos">
        <span>Data:</span>
        <input type="date" value="2017-06-01" disabled="disabled" class="info-eventos">
        <span>Pontuação:</span>
        <input type="number" value="12" disabled="disabled" class="info-eventos">
        <div class="footer-card-evento" style="display: flex; flex-direction: column; gap: 0.5rem;">
            <button class="btn info" id="">Acessar</button>
            <button class="btn danger"id="">Excluir</button>
            <button class="btn warning" id="">Bloquear</button>
        </div>

    </div>
</div> -->



<div class="container-table">
    <div style="width: 100%; overflow-y: overlay;">
        <table id="plenariosTable" style="width: 100%;">
            <tr>
            <th class="hideColumn">ID</th>
                <th>Nome Do Plenário</th>
                <th>Data</th>
                <th>Vagas</th>
                <th>Tipo</th>
                <th>Condicionante</th>
                <th>Local</th>
                <th>Acessar</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody id="plenariosTableBody">
                <!-- Os dados serão inseridos aqui -->
                <?php
                $stmt = $pdo->prepare("SELECT * FROM plenario ORDER BY nm_plenario");
                $stmt->execute();
                $resultados = $stmt->fetchAll();

                if (count($resultados) > 0) {
                    foreach ($resultados as $row) {
                        echo '<tr>';
                        echo '<td class="hideColumn">' . $row['id_plenario'] . '</td>';
                        echo '<td>' . $row['nm_plenario'] . '</td>';
                        echo '<td>' . $row['dt_plenario'] . '</td>';
                        echo '<td>' . $row['qt_vagas'] . '</td>';
                        echo '<td>' . $row['tp_plenario'] . '</td>';
                        echo '<td>' . $row['nm_condicionante'] . '</td>';
                        echo '<td>' . $row['sg_estado_uf'] . '</td>';
                        echo '<td style=" width: 5rem;">';
                        echo '<button class="btn info icon"  onclick="openModalEvento()"><i class="fa-regular fa-eye"></button>';
                        echo '</td>';
                        echo '<td style=" width: 5rem;">';
                        echo '<button class="btn danger icon" onclick="excluirCardPlenario(' . $row['id_plenario'] . ')"><i class="fa-regular fa-trash-can"></i></button>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">Não há plenários cadastrados</td></tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php
function consultarTabela($pdo, $tabela)
{
    // Preparando a consulta
    $stmt = $pdo->prepare("SELECT * FROM $tabela");

    // Executando a consulta
    $stmt->execute();

    // Obtendo os resultados
    return $stmt->fetchAll();
}

// Consultando a tabela "condicionantes"
$resultadoConsultaCondicionantes = consultarTabela($pdo, "condicionante");

// Consultando a tabela "tipoEvento"
$resultados = consultarTabela($pdo, "tipo_evento"); ?>


<dialog id="modal11" class="modal">
    <form id="formularioAdicionarEvento" method="post" action="../backend/cardPlenario.php">
        <div class="modal-content">
            <span>Nome Do Plenário:</span>
            <input type="text" class="inputPlenario" id="inputNomePlenario" name="nm_plenario">
            <span>Data:</span>
            <input type="date" class="inputPlenario data" id="inputDataPlenario" name="dt_plenario">
            <span>Vagas :</span>
            <input type="number" class="inputPlenario vagas" id="inputVagasPlenario" name="qt_vagas">
            <span>Tipo De Evento :</span>
            <select name="tp_plenario" id="tipoEventoPlenario" style="width: 100%;" class="inputPlenario">
                <option value="" data-default disabled selected>Selecione</option>
                <?php foreach ($resultados as $resultado) { ?>
                    <option value="<?php echo $resultado['nm_tipo_evento']; ?>"><?php echo $resultado['nm_tipo_evento']; ?></option>
                <?php } ?>
            </select>
            <span>Condicionate</span>
            <select name="nm_condicionante" id="condicionanteDoEventoPlenario" class="inputPlenario" >
                <option value="" data-default disabled selected>Selecione</option>
                <?php foreach ($resultadoConsultaCondicionantes as $resultadoConsultaCondicionante) { ?>
                    <option value="<?php echo $resultadoConsultaCondicionante['nm_condicionante']; ?>"><?php echo $resultadoConsultaCondicionante['nm_condicionante']; ?></option>
                <?php } ?>
            </select>
            <span>Local:</span>
            <input type="text" class="inputPlenario" id="inputLocalPlenario" name="sg_estado_uf" maxlength="2" size="2">
            <button type="submit" id="openModal11" style="margin-top: 10px !important; margin-bottom: -40px !important; margin-left: 10px !important;" class="btn btn-primary ">Adicionar</button>
            <button type="reset" id="closeModal11" style="margin: 0px 0px 0px 82% !important;" class="btn btn-secondary modalbtn">Fechar</button>
        </div>
    </form>
</dialog>

<script>
    function buscarNoCampoPlenario() {
        //Pegar o input de busca
        const campoDeBusca = document.getElementById('campoDeBuscaPlenario');
        const valorBusca = campoDeBusca.value.toLowerCase();

        //Pegar todos os cards da classe (.card-plenario)
        const cardsEvento = document.querySelectorAll('.card-plenario');
        for (let i = 0; i < cardsEvento.length; i++) {
            const card = cardsEvento[i];
            const nomeEvento = card.querySelector('input[type="text"]').value.toLowerCase();
            if (nomeEvento.includes(valorBusca)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        }
    }
</script>