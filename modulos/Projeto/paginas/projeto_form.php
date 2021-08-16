<form method="POST" action="<?= $this->modulo ?>/<?= $this->acao ?>">

    <!-- id -->
    <input name="id" value="<?= $this->Dado['id'] ?>" hidden>

    <!-- nome -->
    <label for="nome">Nome:</label><br>
    <input name="nome" id="nome" type="text" maxlength="50" value="<?= $this->Dado['nome'] ?>" required>
    <br><br>

    <!-- data_inicio -->
    <label for="data_inicio">Início:</label><br>
    <input name="data_inicio" id="data_inicio" type="date" value="<?= $this->Dado['data_inicio'] ?>" required>
    <br><br>

    <!-- data_fim -->
    <label for="data_fim">Fim:</label><br>
    <input name="data_fim" id="data_fim" type="date" value="<?= $this->Dado['data_fim'] ?>" required>
    <br><br>

    <!-- insert -->
    <button><?= $this->acao_descricao ?></button>
</form>