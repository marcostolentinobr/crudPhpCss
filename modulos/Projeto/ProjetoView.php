<?php

echo "
    <h1>$this->descricao</h1>
    $this->msg
";

require_once __DIR__ . '/paginas/projeto_form.php';

echo '<br>';

require_once __DIR__ . '/paginas/projeto_list.php';
