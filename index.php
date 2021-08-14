<h1>Projeto</h1>

<form method="POST">

    <!-- nome -->
    <label for="nome">Nome:</label><br>
    <input name="nome" id="nome" type="text" placeholder="Nome" required>
    <br><br>

    <!-- data_inicio -->
    <label for="data_inicio">Início:</label><br>
    <input name="data_inicio" id="data_inicio" type="date" placeholder="Início" required>
    <br><br>

    <!-- data_fim -->
    <label for="data_fim">Fim:</label><br>
    <input name="data_fim" id="data_fim" type="date" placeholder="Fim" required>
    <br><br>

    <button>Criar projeto</button>
</form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

function pr($str)
{
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

if ($_POST) {
    //pr($_POST);
    try {
        $PDO = new PDO(
            'mysql:host=localhost;dbname=EUAX;charset=utf8mb4',
            'root',
            '',
            //[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
        );
        //$CNX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $insert = "
            INSERT INTO PROJETO 
            (nome ,  data_inicio,  data_fim) VALUES 
            (:nome, :data_inicio, :data_fim)
        ";
        $prepare = $PDO->prepare($insert/*, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]*/);
        $execute = $prepare->execute([
            'nome' => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim' => $_POST['data_fim'],
        ]);
        echo '<h2 style="color: green">Criado com sucesso!</h2>';
    } catch (Exception $e) {
        //echo '<h2 style="color: red">Erros:</h2>';
        //echo $e->getMessage();
        echo '<h2 style="color: red">Não criado. Tente novamente. Se persistir entre em contato!</h2>';
    }
}
