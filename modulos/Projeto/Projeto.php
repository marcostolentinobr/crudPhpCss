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
        'data_fim' => 'Fim|required|date:Y-m-d',

        //data_concluido
        'data_concluido' => 'Concluído|date:Y-m-d'
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

    protected function getDadosValida($DADOS)
    {
        $return = parent::getDadosValida($DADOS);
        $dados = $return['dados'];

        //data_inicio > data_fim
        if ($dados['data_inicio'] > $dados['data_fim']) {
            $return['erros'][] = 'Data de início deve ser menor que a data fim';
        }

        //data_fim > data_concluido
        if (!empty($dados['data_concluido']) && $dados['data_fim'] > $dados['data_concluido']) {
            $return['erros'][] = 'Data de conclusão deve ser maior que a data fim';
        }

        return $return;
    }
}
