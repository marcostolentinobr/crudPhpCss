<?php

class AtividadeModel extends Model
{

    protected $tabela = 'ATIVIDADE';

    //select
    protected $select = '
        SELECT 
        
               -- atividade 
               A.id,
               A.nome,
               A.data_inicio,
               A.data_fim,
               A.data_concluido,

               -- projeto
               A.projeto_id,       
               P.nome AS projeto_nome        

          FROM ATIVIDADE A
          JOIN PROJETO P
            ON P.id = A.projeto_id
    ';

    protected $select_edit = '
        SELECT 
               -- atividade 
               A.id,
               A.nome,
               A.data_inicio,
               A.data_fim,
               A.data_concluido,
               A.projeto_id       
               
          FROM ATIVIDADE A
         WHERE A.id = :id
    ';
}
