<h1>Projeto</h1>
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

require_once 'Conexao.php';
$Pdo = new Conexao('EUAX');

try {

    if ($_POST) {

        $insert = "
            INSERT INTO PROJETO 
            (nome ,  data_inicio,  data_fim) VALUES 
            (:nome, :data_inicio, :data_fim)
        ";

        $execute = $Pdo->execute($insert, [
            'nome' => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim' => $_POST['data_fim'],
        ]);

        //pr($execute);
        echo '<h2 style="color: green">Criado com sucesso!</h2>';
    }

    $select = '
        SELECT P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido 
          FROM PROJETO P
    ';
    $PROJETOS = $Pdo->fetchAll($select);
} catch (Exception $e) {
    //pr($e);
    exit('<strong style="color: red">Não executou. Tente novamente. Se persistir entre em contato.</strong>');
}

?>

<!-- formulario -->
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
<!-- fim formulario -->

<!-- listagem -->
<table border="1">
    <thead>
        <th>Nome</th>
        <th>Início</th>
        <th>Fim</th>
        <th>Concluído</th>
    </thead>
    <tbody>
        <?php foreach ($PROJETOS as $projeto) : ?>
            <tr>
                <!-- nome -->
                <td><?= $projeto->nome ?></td>

                <!-- data_inicio -->
                <td><?= $projeto->data_inicio ?></td>

                <!-- data_fim -->
                <td><?= $projeto->data_fim ?></td>

                <!-- data_concluido -->
                <td><?= $projeto->data_concluido ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<!-- fim listagem -->