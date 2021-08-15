<?php

class Controller
{
    //Parametros
    protected $modulo;
    protected $acao = 'insert';
    protected $acao_descricao = 'Incluir';
    protected $msg;
    protected $msg_erro = 'Não executou! Tente novamente. Se persistir entre em contato.';
    protected $msg_nenhuma_linha_encontrada = 'Nenhuma linha encontrada';

    //Instancias
    protected $Dado;

    public function __construct()
    {

        //modulo
        $this->modulo = get_called_class();

        //Dado
        $this->Dado = new stdClass();

        //Dados
        $this->Dados = new stdClass();
    }

    //mensagem 
    public function setMsg($msg, $cor, $obs)
    {
        $this->msg = " 
            <h3 style='color: $cor'>
                $msg<br>
                <small style='font-size: 10px; color: silver'>$obs</small>
            </h3>
        ";
    }

    protected function getMsgLinhaAfetada($number)
    {
        return "$number linhas afetada(s)";
    }
}
