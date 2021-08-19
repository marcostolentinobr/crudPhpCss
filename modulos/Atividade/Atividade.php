<?php

class Atividade extends Controller
{
    protected $descricao = 'Atividades';
    protected $descricao_singular = 'Atividade';
    protected $modulo_masculino = false;
    protected $chave = 'id';
    protected $tabela = 'ATIVIDADE';

    protected $estrutura = [

        //projeto_id - manutencao
        'projeto_id' => [
            'descricao' => 'Projeto',
            'params'    => 'required|numeric'
        ],

        //projeto_nome
        'projeto_nome' => [
            'descricao' => 'Projeto',
            'datatable'    => 0
        ],

        //nome - manutencao
        'nome' => [
            'descricao' => 'Nome',
            'params'    => 'required|trim|max:50',
            'datatable'    => 1
        ],

        //data_inicio - manutencao
        'data_inicio' => [
            'descricao' => 'Início',
            'params'    => 'required|date:Y-m-d'
        ],

        //dt_inicio_desc
        'dt_inicio_desc' => [
            'descricao' => 'Início',
            'datatable'    => '2|no-sort'
        ],

        //data_fim - manutencao
        'data_fim' => [
            'descricao' => 'Fim',
            'params' => 'required|date:Y-m-d'
        ],

        //dt_fim_desc
        'dt_fim_desc' => [
            'descricao' => 'Fim',
            'datatable'    => '3|no-sort'
        ],

        //dt_concluido_desc
        'dt_concluido_desc' => [
            'descricao' => 'Concluído',
            'datatable'    => '4|no-sort'
        ]
    ];
}
