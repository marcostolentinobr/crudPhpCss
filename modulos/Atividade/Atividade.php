<?php
require_once __DIR__ . '/AtividadeModel.php';
class Atividade extends Controller
{
    private $descricao = 'Atividades';
    protected $permitido = [

        //projeto_id
        'projeto_id' => [
            'descricao' => 'Projeto',
            'params'    => 'required|numeric'
        ],

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

    public function insert()
    {

        //dados
        $DADOS = $this->getDadosValida($_POST);

        //erros de campo
        if ($DADOS['erros']) {
            $msg = '<li>' . implode('<li>', $DADOS['erros']);
            $cor = 'red';
            $obs = 'Verifique os dados';
        }
        //sem erros de campo
        else {
            $Model = new AtividadeModel();
            $exec =  $Model->insert($DADOS['dados']);

            //erro
            if ($exec['erro']) {
                $msg = $this->msg_erro;
                $cor = 'red';
                $obs = $exec['erro'];
            }
            //sucesso
            else {
                $msg = 'Atividade incluída com sucesso!';
                $cor = 'green';
                $obs = $this->getMsgLinhaAfetada($exec['prep']->rowCount());
            }
        }

        //msg
        $this->setMsg($msg, $cor, $obs);

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
        $DADOS = $this->getDadosValida($_POST);

        //erros de campo
        if ($DADOS['erros']) {
            $msg = '<li>' . implode('<li>', $DADOS['erros']);
            $cor = 'red';
            $obs = 'Verifique os dados';
        } else {
            //where
            $where = ['id' => $_POST['id']];

            $Model = new AtividadeModel();
            $exec =  $Model->update($DADOS['dados'], $where);

            //erro
            if ($exec['erro']) {
                $this->setMsg($this->msg_erro, 'red', $exec['erro']);
            }
            //Nada modificado
            elseif ($exec['prep']->rowCount() == 0) {
                $msg = 'Atividade não alterada, nada modificado';
                $cor = 'red';
                $obs = $this->msg_nenhuma_linha_encontrada;
            }
            //Sucesso
            else {
                $msg = 'Atividade alterada com sucesso!';
                $cor = 'green';
                $obs = $this->getMsgLinhaAfetada($exec['prep']->rowCount());
            }
        }

        //msg
        $this->setMsg($msg, $cor, $obs);

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
