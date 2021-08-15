<h1><?= $this->descricao_plural ?></h1>

<!-- formulario -->
<form method="POST" action="<?= $this->modulo ?>/<?= $this->acao ?>">

    <!-- id -->
    <input name="id" value="<?= $this->Dado->id ?>" hidden>

    <!-- nome -->
    <label for="nome">Nome:</label><br>
    <input name="nome" id="nome" type="text" value="<?= $this->Dado->nome ?>" required>
    <br><br>

    <!-- data_inicio -->
    <label for="data_inicio">Início:</label><br>
    <input name="data_inicio" id="data_inicio" type="date" value="<?= $this->Dado->data_inicio ?>" required>
    <br><br>

    <!-- data_fim -->
    <label for="data_fim">Fim:</label><br>
    <input name="data_fim" id="data_fim" type="date" value="<?= $this->Dado->data_fim ?>" required>
    <br><br>

    <!-- insert -->
    <button><?= $this->acao_descricao ?></button>
</form>
<!-- fim formulario -->

<BR>

<!-- select -->
<table border="1">
    <thead>

        <!-- cabeçalho -->
        <th>Projeto</th>
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
                        <a href="<?= $this->modulo ?>/edit/<?= $dado->id ?>">Editar</a>
                        <a href="<?= $this->modulo ?>/delete/<?= $dado->id ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>
<!-- fim select -->