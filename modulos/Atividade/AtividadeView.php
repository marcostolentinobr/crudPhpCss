<?php

echo "
    <h1>$this->descricao</h1>
    $this->msg
";

require_once __DIR__ . '/paginas/atividadeForm.php';

echo '<br>';

require_once __DIR__ . '/paginas/atividadeList.php';
