<?php

class AtividadeModel extends Model
{
    public $select = "
        SELECT E.id,
               E.nome,
               E.fabricante,
               E.modelo,
               DATE_FORMAT(E.data_aquisicao, '%d/%m/%Y') AS data_aquisicao,
               CASE WHEN E.ativo = 1 THEN 'Sim' ELSE 'Não' END AS ativo
          FROM EQUIPAMENTO E
    ";

    protected $select_edit = '
        SELECT E.id,
               E.nome,
               E.fabricante,
               E.modelo,
               E.data_aquisicao,
               E.ativo
    FROM EQUIPAMENTO E
         WHERE A.id = :id
    ';
}
