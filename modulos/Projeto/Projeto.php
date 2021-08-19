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
