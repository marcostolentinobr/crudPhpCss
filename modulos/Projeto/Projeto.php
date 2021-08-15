<?php
require_once RAIZ . '/libs/Conexao.php';

class Projeto /*extends Controller*/
{

    //Parametros
    private $modulo = __CLASS__;
    private $descricao = 'Projeto';
    private $descricao_plural = 'Projetos';
    private $acao = 'insert';
    private $acao_descricao = 'Incluir';

    //Instancias
    private $Pdo;
    private $Dado;

    //select
    private $select = '
        SELECT P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido 
          FROM PROJETO P
    ';

    function __construct()
    {

        $this->Pdo = new Conexao('EUAX');
        $this->Dado = new stdClass();
    }

    public function insert()
    {

        //query
        $insert = '
            INSERT INTO PROJETO 
            (nome ,  data_inicio,  data_fim) VALUES 
            (:nome, :data_inicio, :data_fim)
        ';

        //execute
        $execute = $this->Pdo->execute($insert, [
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim'],
        ]);

        //mensagem
        echo mensagem_acao('insert', $execute['prepare']->rowCount());

        //list
        $this->list();
    }

    public function update()
    {
        //query
        $delete = '
        UPDATE PROJETO 
           SET nome        = :nome,
               data_inicio = :data_inicio,
               data_fim    = :data_fim
         WHERE id = :id';

        //execute
        $execute = $this->Pdo->execute($delete, [
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim'],
            'id'    => $_POST['id'],
        ]);

        //mensagem
        echo mensagem_acao('update', $execute['prepare']->rowCount());

        //list
        $this->list();
    }

    public function edit()
    {

        //Parametros
        $this->acao = 'update';
        $this->acao_descricao = 'Alterar';

        //where
        $select_edit = $this->select . '
            WHERE P.id = :id
        ';

        //dado
        $this->Dado = $this->Pdo->fetchAll(
            $select_edit,
            ['id' => CHAVE],
            true
        );

        //list
        $this->list();
    }

    public function delete()
    {

        //query
        $delete = '
            DELETE 
              FROM PROJETO 
             WHERE id = :id
        ';

        //execute
        $execute = $this->Pdo->execute($delete, [
            'id' => CHAVE
        ]);

        //mensagem
        echo mensagem_acao('delete', $execute['prepare']->rowCount());

        //list
        $this->list();
    }

    public function list()
    {

        try {
            $Dados = $this->Pdo->fetchAll($this->select);
        } catch (Exception $e) {
            $Dados = new stdClass();
            $Dados->msg = mensagem_acao('erro', $e->getMessage());
        }

        //Dado
        $this->Dado->id          = isset($this->Dado->id)          ? $this->Dado->id          : '';
        $this->Dado->nome        = isset($this->Dado->nome)        ? $this->Dado->nome        : '';
        $this->Dado->data_inicio = isset($this->Dado->data_inicio) ? $this->Dado->data_inicio : '';
        $this->Dado->data_fim    = isset($this->Dado->data_fim)    ? $this->Dado->data_fim    : '';

        //View
        require_once __DIR__ . '/' . __CLASS__ . 'View.php';
    }
}
