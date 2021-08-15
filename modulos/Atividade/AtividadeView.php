<?php

echo "
    <h1>$this->descricao</h1>
    $this->msg
";

require_once __DIR__ . '/paginas/atividade_form.php';

echo '<br>';

require_once __DIR__ . '/paginas/atividade_list.php';
