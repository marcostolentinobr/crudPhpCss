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

    <?php
    
    //Controller
    $fileControler = RAIZ . '/modulos/' . CLASSE . '/' . CLASSE . '.php';
    if (file_exists($fileControler)) {
        //require_once 'modulos/ControllerPadrao.php';
        require_once $fileControler;
    }

    //Classe
    $Classe = CLASSE;
    if (class_exists($Classe)) {
        $Classe = new $Classe();

        //Metodo
        $Metodo = METODO;
        if (method_exists($Classe, $Metodo)) {
            $Classe->$Metodo();
        }
    }
    //Não existe classe
    else {
        echo '
            <p>
                1ª -> Cadastro o projeto<br>
                2ª -> Cadastre a atividade
            </p>
        ';
    }


    ?>
</body>

</html>