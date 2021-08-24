<?php

class DashboardModel extends Model
{
    /*
//projeto concluido
    SELECT  TB.*,
            (TB.concluido_qtd * 100 / TB.total) concluido_por
      FROM ( 
		        SELECT 
		               COUNT(1) AS total,
		               SUM(CASE WHEN data_concluido IS NOT NULL THEN 1 ELSE 0 END) AS concluido_qtd 
		          FROM PROJETO P
           ) TB
*/


    public $select = "
        SELECT P.nome,
               DATE_FORMAT(P.data_fim, '%d/%m/%Y') AS data_fim,
               DATE_FORMAT(A.atividade_fim_max, '%d/%m/%Y') AS atividade_fim_max,
               A.qtd,
               A.concluido_qtd, 
               (A.qtd - A.concluido_qtd) AS falta_qtd,
               ((A.concluido_qtd * 100) / A.qtd) AS concluido_por,
               CASE WHEN (A.qtd - A.concluido_qtd) = 0 THEN 'Concluído'
                    WHEN A.atividade_fim_max > P.data_fim THEN 'Sim' 
                    ELSE 'Não' 
               END AS atrasara
          FROM PROJETO P 
     LEFT JOIN (     
                    SELECT A.projeto_id,
                           MAX(A.data_fim) as atividade_fim_max,
                           COUNT(1) AS qtd,
                           SUM(CASE WHEN A.data_concluido IS NOT NULL THEN 1 ELSE 0 END) AS concluido_qtd
                      FROM ATIVIDADE A
                  GROUP BY A.projeto_id
                ) A
             ON A.projeto_id = P.id
    ";
}
