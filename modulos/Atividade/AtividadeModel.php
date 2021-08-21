<?php

class AtividadeModel extends Model
{
    public $select = "
        SELECT A.id,
               A.nome,
               DATE_FORMAT(A.data_inicio, '%d/%m/%Y') AS dt_inicio_desc,
               DATE_FORMAT(A.data_fim, '%d/%m/%Y') AS dt_fim_desc,
               DATE_FORMAT(A.data_concluido, '%d/%m/%Y') AS dt_concluido_desc,   
               P.nome AS projeto_nome        
          FROM ATIVIDADE A
          JOIN PROJETO P
            ON P.id = A.projeto_id
    ";

    protected $select_edit = '
        SELECT A.id,
               A.nome,
               A.data_inicio,
               A.data_fim,
               A.data_concluido,
               A.projeto_id       
          FROM ATIVIDADE A
         WHERE A.id = :id
    ';
}
