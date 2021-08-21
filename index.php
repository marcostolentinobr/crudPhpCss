<?php require_once __DIR__ . '/config.php' ?>

<!DOCTYPE html>
<html lang="pt-br">

<header>
    <title><?= TITULO ?></title>
    <base href="<?= URL ?>" />
</header>

<body>

    <!-- menu -->
    <strong>EUAX</strong> |
    <a href="<?= URL ?>">Início</a> |
    <a href="<?= URL ?>Projeto/list">Projetos</a> |
    <a href="<?= URL ?>Atividade/list">Atividades</a>

    <!-- instanciar controller -->
    <?php require_once RAIZ . '/modulos/View.php' ?>
</body>

</html>