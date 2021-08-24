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

        //data_fim
        'data_fim' => 'Fim|required|date:Y-m-d'

    ];

    protected $listagem = [

        //nome
        'nome' => 'Projeto|sort:default',

        //data_fim
        'data_fim' => 'Fim|sort:no',

        //atividade_fim_max
        'atividade_fim_max' => 'Última atividade|sort:no',

        //qtd
        'qtd' => 'Qtd Atividade',

        //concluido_qtd
        'concluido_qtd' => 'Qtd concluída',

        //falta_qtd
        'falta_qtd' => 'Qtd faltante',

        //falta_qtd
        'concluido_por' => 'Concluído(%)',

        //atrasara
        'atrasara' => 'Atrasará?'
    ];
}
