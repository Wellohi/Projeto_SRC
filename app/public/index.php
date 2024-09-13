<?php
require_once('./backend/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SR</title>

    <link rel="icon" href="./assets/favicon.ico">
    <!-- CSS LINK -->
    <link rel="stylesheet" href="./css/home.css">    
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/principal.css">

    <!-- Font Awesome CDN Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">
    <link rel="stylesheet" href="https://docs-ds.estaleiro.serpro.gov.br/docs/ds/dist/core.min.css">
    <link rel="stylesheet" href="https://cdngovbr-ds.estaleiro.serpro.gov.br/design-system/fonts/rawline/css/rawline.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>
    <header class="header">
        <nav class="navbar">
        <div class="cabecalho">
            <img class="logo"  alt="">
        </div>
        </nav>
    </header>

    <main class="main">
        <form method="POST" action="/backend/login.php" class="form">
            <fieldset id="fieldset-index">
                <div class="br-input small input-button">
                    <label for="input-login-small">Usuário </label>
                    <input type="text" id="input-login-small" class="lowerLabel" placeholder="Digite seu usuário" name="nm_usuario" required>
                    <button class="br-button" type="button" aria-label="Buscar"><i class="fa-solid fa-user" aria-hidden="true"></i></button>
                </div>
                <div class="br-input input-button">
                    <label for="input-password">Senha </label>
                    <input type="password" name="bn_senha_usuario" id="input-password" placeholder="Digite sua senha" class="lowerLabel" required>
                    <button class="br-button" type="button" aria-label="Exibir senha" role="switch" aria-checked="false"><i class="fas fa-eye" aria-hidden="true"></i></button>
                </div>
                <div>
                    <button style=" width: 80%; margin-left: 10%; " class="btn-adicionar br-button primary mr-3" type="submit">Acessar</button>
                </div>

                <div>
                    <button style=" width: 80%; margin-left: 10%; " class="btn-adicionar br-button secondary mr-3" type="submit">Certificado</button>
                </div>
                <div style="padding-left: 10px; color: #cccccc; font-size: 13px;" >Sistema de Ranqueamento</div>
                <div class="versao">v 1.0.6</div>
            </fieldset>
        </form>
    </main>

    <script src="./js/script.js"></script>
</body>
</html>