<?php

class ProjetoModel extends Model
{

    protected $public = '
        SELECT 
        
               -- projeto
               P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido

          FROM PROJETO P
    ';

    protected $select_edit = '
        SELECT 
               -- projeto
               P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido    
               
          FROM PROJETO P
         WHERE P.id = :id
    ';
}
