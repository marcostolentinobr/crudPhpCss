<?php
require_once RAIZ . '/libs/Conexao.php';

class Atividade extends Controller
{

    //Params
    private $modulo = __CLASS__;
    private $descricao = 'Atividades';

    //select
    private $select = '
        SELECT 
        
               -- atividade 
               A.id,
               A.nome,
               A.data_inicio,
               A.data_fim,
               A.data_concluido,

               -- projeto
               A.projeto_id,       
               P.nome AS projeto_nome        

          FROM ATIVIDADE A
          JOIN PROJETO P
            ON P.id = A.projeto_id
    ';

    public function insert()
    {

        //qry
        $insert = '
            INSERT INTO ATIVIDADE 
            ( projeto_id,  nome,  data_inicio,  data_fim) VALUES 
            (:projeto_id, :nome, :data_inicio, :data_fim)
        ';

        //line
        $line = [
            'projeto_id'  => $_POST['projeto_id'],
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim'],
        ];

        //exec
        $exec = $this->Pdo->prepExec($insert,  $line);

        //erro
        if ($exec['erro']) {
            $this->setMsg($this->msg_erro, 'red', $exec['erro']);
        }
        //sucesso
        else {
            $this->setMsg(
                'Atividade incluída com sucesso!',
                'green',
                $exec['prep']->rowCount() . ' linhas afetadas'
            );
        }

        //list
        $this->list();
    }

    public function update()
    {
        //qry
        $delete = '
        UPDATE ATIVIDADE 
           SET projeto_id  = :projeto_id,
               nome        = :nome,
               data_inicio = :data_inicio,
               data_fim    = :data_fim
         WHERE id = :id';

        //line
        $line = [
            'projeto_id'  => trim($_POST['projeto_id']),
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim']
        ];

        //where
        $where = ['id' => $_POST['id']];

        //exec
        $exec = $this->Pdo->prepExec($delete, array_merge($line, $where));

        //erro
        if ($exec['erro']) {
            $this->setMsg($this->msg_erro, 'red', $exec['erro']);
        }
        //Não encontrado
        elseif ($exec['prep']->rowCount() == 0) {
            $this->setMsg('Atividade não alterada, nada modificado', 'red', '0 linhas encontradas');
        }
        //Sucesso
        else {
            $this->setMsg(
                'Atividade alterada com sucesso!',
                'green',
                $exec['prep']->rowCount() . ' linhas afetadas'
            );
        }

        //list
        $this->list();
    }

    public function edit()
    {

        //select
        //### ATENÇÃO ### - melhorar performa-se aqui pois não precisa do join do select padrão
        $select_edit = $this->select . '
            WHERE A.id = :id
        ';

        //where
        $where = ['id' => CHAVE];

        //all
        $all = $this->Pdo->all($select_edit, $where);

        //dado
        $this->Dado = (isset($all['dados'][0]) ? $all['dados'][0] : new stdClass());

        //erro
        if ($all['erro']) {
            $this->setMsg($this->msg_erro, 'red', $all['erro']);
        }
        //Não encontrado
        elseif (count((array)$this->Dado) == 0) {
            $this->setMsg('Atividade não encontrada para editar', 'red', '0 linhas encontradas');
        }
        //Sucesso
        else {
            //Params
            $this->acao = 'update';
            $this->acao_descricao = 'Alterar';
        }

        //list
        $this->list();
    }

    public function delete()
    {

        //qry
        $delete = '
            DELETE 
              FROM ATIVIDADE
             WHERE id = :id
        ';

        //where
        $where = ['id' => CHAVE];

        //exec
        $exec = $this->Pdo->prepExec($delete, $where);

        //erro
        if ($exec['erro']) {
            $this->setMsg($this->msg_erro, 'red', $exec['erro']);
        } 
        //Não encontrado
        elseif ($exec['prep']->rowCount() == 0) {
            $this->setMsg('Atividade não encontrada para excluir', 'red', '0 linhas encontradas');
        }
        //Sucesso
        else {
            $this->setMsg(
                'Atividade excluída com sucesso!',
                'green',
                $exec['prep']->rowCount() . ' linhas afetadas'
            );
        }


        //list
        $this->list();
    }

    public function list()
    {

        //dado
        $this->setDado();

        //all
        $all = $this->Pdo->all($this->select);

        //dados
        $this->Dados = $all['dados'];

        //erro
        if ($all['erro']) {
            $this->setMsg($this->msg_erro, 'red', $all['erro']);
        }

        //View
        require_once __DIR__ . '/' . __CLASS__ . 'View.php';
    }

    private function setDado()
    {
        //Dado Projeto
        $this->Dado->projeto_id  = isset($this->Dado->projeto_id)  ? $this->Dado->projeto_id  : '';

        //Dado Atividade
        $this->Dado->id          = isset($this->Dado->id)          ? $this->Dado->id          : '';
        $this->Dado->nome        = isset($this->Dado->nome)        ? $this->Dado->nome        : '';
        $this->Dado->data_inicio = isset($this->Dado->data_inicio) ? $this->Dado->data_inicio : '';
        $this->Dado->data_fim    = isset($this->Dado->data_fim)    ? $this->Dado->data_fim    : '';
    }
}
