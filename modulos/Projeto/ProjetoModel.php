<?php

class ProjetoModel extends Model
{

    public $select = "
        SELECT P.id,
               P.nome AS projeto_nome,
               DATE_FORMAT(P.data_inicio, '%d/%m/%Y') AS dt_inicio_desc,
               DATE_FORMAT(P.data_fim, '%d/%m/%Y') AS dt_fim_desc,
               DATE_FORMAT(P.data_concluido, '%d/%m/%Y') AS dt_concluido_desc
          FROM PROJETO P
    ";

    protected $select_edit = '
        SELECT P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido    
          FROM PROJETO P
         WHERE P.id = :id
    ';
}
