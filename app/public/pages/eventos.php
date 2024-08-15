<link rel="stylesheet" href="../css/eventos.css">

<!-- Atualizado <input type="text" id="campoDeBusca" onkeyup="buscar()" placeholder="Digite o Nome Do evento..."> -->
<!-- <div class="divisao">
            <input type="text" id="campoDeBusca" onkeyup="buscarNoCampoPlenario()" placeholder="Digite o Nome Do evento...">
        </div> -->

<div class="btnadd">
    <button id="openModal7" class="btn-adicionar br-button primary mr-3"
        style="position: relative;margin: 0 0 0 86%;">Adicionar evento</button>
</div>

<div class="container-table">
    <div style="width: 100%; " class="tableOverflow">
        <table id="eventosTable" style="width: 100%;">
            <thead>
                <tr class="cabecalho-tabela">
                    <th class="hideColumn">ID</th>
                    <th>Nome Do Evento</th>
                    <th>Tipo Do Evento</th>
                    <th>Condicionante</th>
                    <th>Data do Evento</th>
                    <th>Pontuação</th>
                    <th>Acessar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody class="conteudo-tabela">
                <?php
                $stmt = $pdo->prepare("
                    SELECT e.*, t.vl_pontuacao_conselheiro FROM evento e INNER JOIN tipo_evento t ON e.tp_evento = t.nm_tipo_evento ORDER BY e.nm_evento ");
                $stmt->execute();
                $resultados = $stmt->fetchAll();

                if (count($resultados) > 0) {
                    foreach ($resultados as $row) {
                        echo '<tr>';
                        echo '<td class="hideColumn">' . $row['id_evento'] . '</td>';
                        echo '<td>' . $row['nm_evento'] . '</td>';
                        echo '<td>' . $row['tp_evento'] . '</td>';
                        echo '<td>' . $row['nm_condicionante'] . '</td>';
                        echo '<td>' . $row['dt_evento'] . '</td>';
                        echo '<td style="width: 30px">' . $row['vl_pontuacao_conselheiro'] . '</td>'; // Valor do JOIN
                        echo '<td style="width: 5rem;">';
                        echo '<button class="btn info icon" onclick="openModalEvento('
                            . $row['id_evento'] . ', \''
                            . $row['nm_evento'] . '\', \''
                            . $row['tp_evento'] . '\', \''
                            . $row['nm_condicionante'] . '\', \''
                            . $row['dt_evento'] . '\', '
                            . $row['vl_pontuacao_conselheiro'] . ')"><i class="fa-regular fa-eye"></i></button>';
                        echo '</td>';
                        echo '<td style="width: 5rem;">';
                        echo '<button class="btn danger icon" onclick="excluirCard(' . $row['id_evento'] . ')"><i class="fa-regular fa-trash-can"></i></button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">Não há eventos cadastrados</td></tr>';
                }
                ?>

            </tbody>
        </table>

        <!-- Modais -->

        <dialog id="modal7" class="modal">
            <div class="modal-content">
                <!-- <h2>Deseja Adicionar um Evento ?</h2> -->
                <form id="formularioAdicionarEvento" method="post" action="../backend/cardEvento.php">
                    <div class="row">
                        <span>Nome do Evento:</span>
                        <br>
                        <input id="inputNomeDoEvento" class="inputEvento" value="" name="nm_evento" type="text"
                            placeholder="Nome do Evento">
                    </div>
                    <div class="row">
                        <span>Data do Evento:</span>
                        <br>
                        <input id="inputDataDoEvento" class="inputEvento" value="" name="dt_evento" type="date">
                    </div>
                    <div class="row">
                        <?php
                        // Preparando a consulta
                        $stmt = $pdo->prepare("SELECT * FROM tipo_evento");

                        // Executando a consulta
                        $stmt->execute();

                        // Obtendo os resultados
                        $resultados = $stmt->fetchAll();
                        ?>
                        <span>Tipo Do Evento:</span>
                        <br>
                        <select name="tp_evento" id="Tipo" style="width: 100%;" class="inputEvento">
                            <option value="" data-default disabled selected>Selecione</option>
                            <?php foreach ($resultados as $resultado) { ?>
                                <option value="<?php echo $resultado['nm_tipo_evento']; ?>">
                                    <?php echo $resultado['nm_tipo_evento']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <?php

                        // Preparando a consulta
                        $stmt = $pdo->prepare("SELECT * FROM condicionante");

                        // Executando a consulta
                        $stmt->execute();

                        // Obtendo os resultados
                        $resultadoConsultaCondicionantes = $stmt->fetchAll(); ?>
                        <span>Condicionante:</span>
                        <br>
                        <select name="nm_condicionante" id="Condicionante" class="inputEvento">
                            <option value="" data-default disabled selected>Selecione</option>
                            <?php foreach ($resultadoConsultaCondicionantes as $resultadoConsultaCondicionante) { ?>
                                <option value="<?php echo $resultadoConsultaCondicionante['nm_condicionante']; ?>">
                                    <?php echo $resultadoConsultaCondicionante['nm_condicionante']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" id="adicionarCard" class="br-button primary mr-3">Adicionar</button>
                        <button type="reset" id="closeModal7" class="br-button secondary mr-3">Fechar</button>
                    </div>
                </form>
            </div>
        </dialog>

    </div>
</div>
</div>
</div>

<dialog id="modal-acessarEvento" class="modal">
    <div class="modal-content" style="width: 620px">

        <table id="eventosTable">
            <h2>TABELA DE TESTE</h2>
            <tr>
                <!-- <th class="hideColumn">ID</th> -->
                <th>Conselheiros</th>
                <th>Ações</th>
                <!-- <th>Condicionante</th>
                <th>Data do Evento</th>
                <th>Pontuação</th> -->
            </tr>
            <!-- <tr>
                <td id="eventoId" class="hideColumn"></td>
                <td id="eventoNome"></td>
                <td id="eventoTipo"></td>
                <td id="eventoCondicionante"></td>
                <td id="eventoData"></td>
                <td id="eventoPontuacao"></td> 
            </tr> -->
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
                echo "<td class='conselheirosAdicionados'>";
                echo "<button id='openModal10'
                    data-id='" . $resultado['id_conselheiro'] . "'
                    data-nome='" . $resultado['nm_conselheiro'] . "' 
                    class='br-button secondary mr-3'>Remover</button>";
                echo "</td>";
                echo "</tr>";
            }

            ?>
        </table>
        <div class="tabelaDeAdicaoERemocao">
            <?php

            // Preparando a consulta
            $stmt = $pdo->prepare("SELECT * FROM tabela_conselheiro");

            // Executando a consulta
            $stmt->execute();

            // Obtendo os resultados
            $resultadoTabelaConselheiros = $stmt->fetchAll();

            //id, pontuacao, conselheiro, data, evento 
            ; ?>
            <?php foreach ($resultadoTabelaConselheiros as $resultadoTabelaConselheiro) { ?>
                <table>
                    <tr>
                        <th>Participantes</th>
                        <th>Remover Participantes</th>
                    </tr>
                    <tr>
                        <td><?= $resultadoTabelaConselheiro['nm_conselheiro'] ?></td>
                        <td><button class="br-button secondary mr-3">Remover</button></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="button-groups-cardEventos"
                style="display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                <button class="br-button primary mr-3">Adicionar Participantes</button>
                <button class="br-button secondary mr-3">Remover Todos</button>
                <button type="button" class="br-button secondary mr-3" onclick="closeModalEvento()">Sair</button>

            </div>
</dialog>



<?php include("./funcionalidadesEventos.php"); ?>