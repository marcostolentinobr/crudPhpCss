<?php
require_once __DIR__ . '/AtividadeModel.php';
class Atividade extends Controller
{
    private $descricao = 'Atividades';

    public function insert()
    {

        //line
        $line = [
            'projeto_id'  => $_POST['projeto_id'],
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim'],
        ];

        $Model = new AtividadeModel();
        $exec =  $Model->insert($line);

        //erro
        if ($exec['erro']) {
            $this->setMsg($this->msg_erro, 'red', $exec['erro']);
        }
        //sucesso
        else {
            $this->setMsg(
                'Atividade incluída com sucesso!',
                'green',
                $this->getMsgLinhaAfetada($exec['prep']->rowCount())
            );
        }

        //list
        $this->list();
    }

    public function list()
    {

        $Model = new AtividadeModel();
        $all =  $Model->list();

        //dados
        $this->Dados = $all['dados'];

        //erro
        if ($all['erro']) {
            $this->setMsg($this->msg_erro, 'red', $all['erro']);
        }

        //dado
        $this->setDado();

        //View
        require_once __DIR__ . '/' . __CLASS__ . 'View.php';
    }

    public function delete()
    {

        //where
        $where = ['id' => CHAVE];

        $Model = new AtividadeModel();
        $exec =  $Model->delete($where);

        //erro
        if ($exec['erro']) {
            $this->setMsg($this->msg_erro, 'red', $exec['erro']);
        }
        //Não encontrado
        elseif ($exec['prep']->rowCount() == 0) {
            $this->setMsg(
                'Atividade não encontrada para excluir',
                'red',
                $this->msg_nenhuma_linha_encontrada
            );
        }
        //Sucesso
        else {
            $this->setMsg(
                'Atividade excluída com sucesso!',
                'green',
                $this->getMsgLinhaAfetada($exec['prep']->rowCount())
            );
        }

        //list
        $this->list();
    }

    public function edit()
    {

        //where
        $where = ['id' => CHAVE];

        //all
        $Model = new AtividadeModel();
        $all = $Model->list($where);

        //dado
        $this->Dado = (isset($all['dados'][0]) ? $all['dados'][0] : new stdClass());

        //erro
        if ($all['erro']) {
            $this->setMsg($this->msg_erro, 'red', $all['erro']);
        }
        //Não encontrado
        elseif (count((array)$this->Dado) == 0) {
            $this->setMsg(
                'Atividade não encontrada para editar',
                'red',
                $this->msg_nenhuma_linha_encontrada
            );
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

    public function update()
    {

        //line
        $line = [
            'projeto_id'  => trim($_POST['projeto_id']),
            'nome'        => trim($_POST['nome']),
            'data_inicio' => $_POST['data_inicio'],
            'data_fim'    => $_POST['data_fim']
        ];

        //where
        $where = ['id' => $_POST['id']];

        $Model = new AtividadeModel();
        $exec =  $Model->update($line, $where);

        //erro
        if ($exec['erro']) {
            $this->setMsg($this->msg_erro, 'red', $exec['erro']);
        }
        //Nada modificado
        elseif ($exec['prep']->rowCount() == 0) {
            $this->setMsg(
                'Atividade não alterada, nada modificado',
                'red',
                $this->msg_nenhuma_linha_encontrada
            );
        }
        //Sucesso
        else {
            $this->setMsg(
                'Atividade alterada com sucesso!',
                'green',
                $this->getMsgLinhaAfetada($exec['prep']->rowCount())
            );
        }

        //list
        $this->list();
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
