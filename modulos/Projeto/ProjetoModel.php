<?php

class ProjetoModel extends Model
{

    public $select = "
        SELECT P.id,
               P.nome,
               DATE_FORMAT(P.data_inicio, '%d/%m/%Y') data_inicio,
               DATE_FORMAT(P.data_fim, '%d/%m/%Y') data_fim,
               DATE_FORMAT(P.data_concluido, '%d/%m/%Y') data_concluido
          FROM PROJETO P
      ORDER BY P.nome 
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
