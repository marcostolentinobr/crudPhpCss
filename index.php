<?php require_once __DIR__ . '/config.php' ?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <header>
        <title><?= TITULO ?></title>
        <base href="<?= URL ?>" />
    </header>

<body class="container">

    <!-- menu -->
    <strong>EUAX</strong> |
    <a href="<?= URL ?>">Início</a> |
    <a href="<?= URL ?>Projeto/list">Projetos</a> |
    <a href="<?= URL ?>Atividade/list">Atividades</a>

    <?php require_once RAIZ . '/modulos/View.php' ?>
</body>

</html>