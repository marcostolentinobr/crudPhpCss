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

        <!-- Sem dados -->
        <?php if (count((array)$this->Dados) == 0) : ?>
            <tr>
                <td colspan="100%">Sem dados para listar</td>
            </tr>
        <?php else : ?>

            <!-- loop de dados -->
            <?php foreach ($this->Dados as $dado) : ?>
                <tr>

                    <!-- dados -->
                    <td><?= $dado['nome'] ?></td>
                    <td><?= $dado['data_inicio'] ?></td>
                    <td><?= $dado['data_fim'] ?></td>
                    <td><?= $dado['data_concluido'] ?></td>

                    <!-- ações -->
                    <td>
                        <a href="<?= $this->modulo ?>/edit/<?= $dado['id'] ?>">Editar</a>
                        <a href="<?= $this->modulo ?>/delete/<?= $dado['id'] ?>">Excluir</a>
                    </td>

                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>