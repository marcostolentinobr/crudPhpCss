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

//select
$select = '
    SELECT P.id,
           P.nome,
           P.data_inicio,
           P.data_fim,
           P.data_concluido 
      FROM PROJETO P
';

$acao = 'insert';
$acaoDescricao = 'Incluir';

try {

    //insert
    if (isset($_POST['ACAO']) && $_POST['ACAO'] == 'insert') {

        //query
        $insert = '
            INSERT INTO PROJETO 
            (nome ,  data_inicio,  data_fim) VALUES 
            (:nome, :data_inicio, :data_fim)
        ';

        //execute
        $execute = $Pdo->execute($insert, [
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim'],
        ]);

        //mensagem
        echo " 
            <h2 style='color: green'>
                Incluído com sucesso!<br>
                <small style='font-size: 10px; color: silver'>Linhas afetadas: {$execute['prepare']->rowCount()}</small>
            </h2>
        ";
    }
    //delete
    elseif (isset($_POST['ACAO']) && $_POST['ACAO'] == 'delete') {

        //query
        $delete = '
            DELETE 
              FROM PROJETO 
             WHERE id = :id
        ';

        //execute
        $execute = $Pdo->execute($delete, [
            'id' => $_POST['id']
        ]);

        //mensagem
        echo " 
            <h2 style='color: green'>
                Excluído com sucesso!<br>
                <small style='font-size: 10px; color: silver'>Linhas afetadas: {$execute['prepare']->rowCount()}</small>
            </h2>
        ";
    }
    //update
    elseif (isset($_POST['ACAO']) && $_POST['ACAO'] == 'update') {

        //query
        $delete = '
            UPDATE PROJETO 
               SET nome        = :nome,
                   data_inicio = :data_inicio,
                   data_fim    = :data_fim
             WHERE id = :id';

        //execute
        $execute = $Pdo->execute($delete, [
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim'],
            'id'    => $_POST['id'],
        ]);

        //mensagem
        echo " 
            <h2 style='color: green'>
                Alterado com sucesso!<br>
                <small style='font-size: 10px; color: silver'>Linhas afetadas: {$execute['prepare']->rowCount()}</small>
            </h2>
        ";
    }
    //edit
    elseif (isset($_POST['ACAO']) && $_POST['ACAO'] == 'edit') {
        $acao = 'update';
        $acaoDescricao = 'Alterar';

        //where
        $select_edit = $select . '
            WHERE id = :id
        ';

        //dado
        $Dado = $Pdo->fetchAll(
            $select_edit,
            ['id' => $_POST['id']],
            true
        );

    }
} catch (Exception $e) {
    echo " 
        <h2 style='color: red'>
            Não executou! Tente novamente. Se persistir entre em contato.<br>
            <small style='font-size: 10px; color: silver'>{$e->getMessage()}</small>
        </h2>
    ";
}

try {
    $Dados = $Pdo->fetchAll($select);
} catch (Exception $e) {
    $Dados = new stdClass();
    $Dados->msg = " 
        <h2 style='color: red'>
            Não listou! Tente novamente. Se persistir entre em contato.<br>
            <small style='font-size: 10px; color: silver'>{$e->getMessage()}</small>
        </h2>
    ";
}

if (!isset($Dado)) {
    $Dado = new stdClass();
}

$Dado->id          = isset($Dado->id) ? $Dado->id : '';
$Dado->nome        = isset($Dado->nome) ? $Dado->nome : '';
$Dado->data_inicio = isset($Dado->data_inicio) ? $Dado->data_inicio : '';
$Dado->data_fim    = isset($Dado->data_fim) ? $Dado->data_fim : '';
?>

<!-- formulario -->
<form method="POST">

    <!-- id -->
    <input name="id" value="<?= $Dado->id ?>" hidden>

    <!-- nome -->
    <label for="nome">Nome:</label><br>
    <input name="nome" id="nome" type="text" value="<?= $Dado->nome ?>" placeholder="Nome" required>
    <br><br>

    <!-- data_inicio -->
    <label for="data_inicio">Início:</label><br>
    <input name="data_inicio" id="data_inicio" type="date" value="<?= $Dado->data_inicio ?>" placeholder="Início" required>
    <br><br>

    <!-- data_fim -->
    <label for="data_fim">Fim:</label><br>
    <input name="data_fim" id="data_fim" type="date" value="<?= $Dado->data_fim ?>" placeholder="Fim" required>
    <br><br>

    <!-- insert -->
    <button name="ACAO" value="<?= $acao ?>"><?= $acaoDescricao ?></button>
</form>
<!-- fim formulario -->

<!-- select -->
<table border="1">
    <thead>

        <!-- cabeçalho -->
        <th>Nome</th>
        <th>Início</th>
        <th>Fim</th>
        <th>Concluído</th>
        <th>Ações</th>

    </thead>
    <tbody>

        <?php if (isset($Dados->msg)) : ?>
            <tr>
                <td colspan="100%"><?= $Dados->msg ?></td>
            </tr>
        <?php elseif (count((array)$Dados) == 0) : ?>
            <tr>
                <td colspan="100%">Sem dados para listar</td>
            </tr>
        <?php else : ?>
            <?php foreach ($Dados as $dado) : ?>
                <tr>

                    <!-- dados -->
                    <td><?= $dado->nome ?></td>
                    <td><?= $dado->data_inicio ?></td>
                    <td><?= $dado->data_fim ?></td>
                    <td><?= $dado->data_concluido ?></td>

                    <!-- ações -->
                    <td>
                        <form method="POST">
                            <input name="id" value="<?= $dado->id ?>" hidden>
                            <button name="ACAO" value="edit">Editar</button>
                            <button name="ACAO" value="delete">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>
<!-- fim select -->