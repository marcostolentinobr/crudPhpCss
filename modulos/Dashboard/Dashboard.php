<?php

class Dashboard extends Controller
{
    protected $descricao = 'Projetos';

    protected $listagem = [

        //nome
        'nome' => 'Projeto|sort:default',

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


    protected function view()
    {
        echo "<h1>$this->descricao</h1>";
        $this->setLista();
        require_once RAIZ . '/modulos/_paginas/template_datatable.php';
    }
