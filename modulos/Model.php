<?php
require_once RAIZ . '/libs/Conexao.php';
class Model
{
    public function __construct()
    {
        //Conexao
        $this->Pdo = new Conexao('EUAX');
    }
}
