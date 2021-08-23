<?php

class Projeto extends Controller
{
    protected $descricao = 'Projetos';
    protected $descricao_singular = 'Projeto';
    protected $modulo_masculino = true;
    protected $chave = 'id';
    protected $tabela = 'PROJETO';

    //manutencao
    protected $manutencao = [

        //nome
        'nome' => 'Projeto|required|trim|max:50|min:3',

        //data_inicio
        'data_inicio' => 'Início|required|date:Y-m-d',

        //data_fim
        'data_fim' => 'Fim|required|date:Y-m-d'
    ];

    protected $listagem = [

        //nome
        'nome' => 'Projeto|sort:default',

        //data_inicio
        'data_inicio' => 'Início|sort:no',

        //data_fim
        'data_fim' => 'Fim|sort:no',

        //data_concluido
        'data_concluido' => 'Concluído|sort:no',
    ];
}
