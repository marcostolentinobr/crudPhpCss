<?php

class Equipamento extends Controller
{
    protected $descricao = 'Equipamentos';
    protected $descricao_singular = 'Equipamento';
    protected $modulo_masculino = true;
    protected $chave = 'id';
    protected $tabela = 'EQUIPAMENTO';

    //manutencao
    protected $manutencao = [

        //nome
        'nome' => 'Nome|required|trim|max:50|min:3',

        //fabricante
        'fabricante' => 'Fabricante|required|trim|max:50|min:3',

        //modelo
        'modelo' => 'Modelo|required|trim|max:50|min:3',

        //data_aquisicao
        'data_aquisicao' => 'Aquisição|required|date:Y-m-d',

        //ativo
        'ativo' => 'Ativo|required|numeric'
    ];

    protected $listagem = [

        //projeto_nome
        'nome' => 'Nome|sort:default',

        //nome
        'fabricante' => 'Fabricante',

        //nome
        'modelo' => 'Modelo',

        //data_aquisicao
        'data_aquisicao' => 'Aquisição|sort:no',

        //data_aquisicao
        'ativo' => 'Ativo',

    ];
}
