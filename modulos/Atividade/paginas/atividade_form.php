<form class="modal fade was-validated" data-bs-backdrop="static" id="modal_form_incluir_<?= $this->modulo ?>" action="<?= $this->modulo ?>/<?= $this->acao ?>" method="POST">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <!-- title -->
                <h5 class="modal-title"><?= "Incluir $this->descricao_singular" ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- id -->
                <input id="id" name="id" value="<?= $this->Dado['id'] ?>" hidden>

                <div class="row g-3">

                    <!-- projeto_id -->
                    <div class="col-sm-6">
                        <label for="projeto_id" class="form-label">Projeto:</label>
                        <select class="form-select" name="projeto_id" id="projeto_id" required>
                            <option></option>
                            <?php foreach ($this->ProjetoDados as $dado) : ?>
                                <option value="<?= $dado['projeto_id'] ?>" <?= $this->Dado['projeto_id'] == $dado['projeto_id'] ? 'selected' : '' ?>>
                                    <?= $dado['nome'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- nome -->
                    <div class="col-sm-6">
                        <label for="nome" class="form-label">Atividade:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required minlength="3" maxlength="255" value="<?= $this->Dado['nome'] ?>">
                    </div>

                </div>

                <div class="row g-3">

                    <!-- data_inicio -->
                    <div class="col-sm-6">
                        <label for="data_inicio" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="data_inicio" name="data_inicio" required value="<?= $this->Dado['data_inicio'] ?>">
                    </div>

                    <!-- data_fim -->
                    <div class="col-sm-6">
                        <label for="data_fim" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="data_fim" name="data_fim" required value="<?= $this->Dado['data_fim'] ?>">
                    </div>

                </div>

            </div>

            <!-- btn -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button class="btn btn-success">Incluir</button>
            </div>

        </div>
    </div>
</form>