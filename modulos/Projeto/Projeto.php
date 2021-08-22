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
        'nome' => 'Projeto|required|trim|max:50',

        //data_inicio
        'data_inicio' => 'Início|required|date:Y-m-d',

        //data_fim
        'data_fim' => 'Fim|required|date:Y-m-d'
    ];

    protected $listagem = [

        //nome
        'nome' => 'Projeto|sort:default',

        //dt_inicio_desc
        'data_inicio' => 'Início|sort:no',

        //dt_fim_desc
        'data_fim' => 'Fim|sort:no',

        //dt_concluido_desc
        'data_concluido' => 'Concluído|sort:no',
    ];

    public function list()
    {
        $this->CidadeDados = $this->Model->getList('Projeto');
        parent::list();
    }
}
