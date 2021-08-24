<?php

class ProjetoModel extends Model
{

    public $select = "
        SELECT P.id,
               P.nome,
               DATE_FORMAT(P.data_fim, '%d/%m/%Y') AS data_fim
          FROM PROJETO P
    ";

    protected $select_edit = '
        SELECT P.id,
               P.nome,
               P.data_fim
          FROM PROJETO P
         WHERE P.id = :id
    ';
}
