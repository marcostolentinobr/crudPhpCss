<?php

class Projeto extends Controller
{
    protected $descricao = 'Projetos';
    protected $descricao_singular = 'Projeto';
    protected $modulo_masculino = true;
    protected $chave = 'id';
    protected $tabela = 'PROJETO';

    protected $estrutura = [

        //nome
        'projeto_nome' => [
            'descricao' => 'Nome',
            'datatable'    => 0
        ],

        //nome
        'nome' => [
            'descricao' => 'Projeto',
            'params'    => 'required|trim|max:50',
        ],

        //data_inicio
        'data_inicio' => [
            'descricao' => 'Início',
            'params'    => 'required|date:Y-m-d',
        ],

        //dt_inicio_desc
        'dt_inicio_desc' => [
            'descricao' => 'Início',
            'datatable'    => '1|no-sort'
        ],

        //data_fim
        'data_fim' => [
            'descricao' => 'Fim',
            'params' => 'required|date:Y-m-d'
        ],

        //dt_fim_desc
        'dt_fim_desc' => [
            'descricao' => 'Fim',
            'datatable'    => '2|no-sort'
        ],

        //dt_concluido_desc
        'dt_concluido_desc' => [
            'descricao' => 'Concluído',
            'datatable'    => '3|no-sort'
        ]
    ];
}
