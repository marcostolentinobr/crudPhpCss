<?php

class Atividade extends Controller
{
    protected $descricao = 'Atividades';
    protected $descricao_singular = 'Atividade';
    protected $modulo_masculino = false;
    protected $chave = 'id';
    protected $tabela = 'ATIVIDADE';

    //Projeto
    protected $ProjetoDados = [];

    //manutencao
    protected $manutencao = [

        //projeto_id
        'projeto_id' => 'Projeto|required|numeric',

        //nome
        'nome' => 'Atividade|required|trim|max:50',

        //data_inicio
        'data_inicio' => 'Início|required|date:Y-m-d',

        //data_fim
        'data_fim' => 'Fim|required|date:Y-m-d'
    ];

    protected $listagem = [

        //projeto_nome
        'projeto_nome' => 'Projeto|sort:default',

        //nome
        'nome' => 'Atividade',

        //dt_inicio_desc
        'data_inicio' => 'Início|sort:no',

        //dt_fim_desc
        'data_fim' => 'Fim|sort:no',

        //dt_concluido_desc
        'data_concluido' => 'Concluído|sort:no',
    ];

    public function list()
    {
        $this->ProjetoDados = $this->Model->getList('Projeto');
        parent::list();
    }
}
