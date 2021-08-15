<?php

class Controller
{
    //Parametros
    protected $acao = 'insert';
    protected $acao_descricao = 'Incluir';
    protected $msg;
    protected $msg_erro = 'Não executou! Tente novamente. Se persistir entre em contato.';

    //Instancias
    protected $Pdo;
    protected $Dado;

    public function __construct()
    {

        //Conexao
        $this->Pdo = new Conexao('EUAX');

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
}
