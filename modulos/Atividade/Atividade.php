<?php

class Atividade extends Controller
{
    protected $descricao = 'Atividades';
    protected $descricao_singular = 'Atividade';
    protected $modulo_masculino = false;
    protected $chave = 'id';
    protected $tabela = 'ATIVIDADE';

    protected $permitido = [

        //projeto_id
        'projeto_id' => [
            'descricao' => 'Projeto',
            'params'    => 'required|numeric'
        ],

        //nome
        'nome' => [
            'descricao' => 'Nome',
            'params'    => 'required|trim|max:50'
        ],

        //data_inicio
        'data_inicio' => [
            'descricao' => 'Início',
            'params'    => 'required|date:Y-m-d'
        ],

        //data_fim
        'data_fim' => [
            'descricao' => 'Fim',
            'params' => 'required|date:Y-m-d'
        ]
    ];
    
}
