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
            <h4 style='color: $cor'>
                $msg<br>
                <small style='font-size: 10px; color: silver'>$obs</small>
            </h4>
        ";
    }

    protected function getMsgLinhaAfetada($number)
    {
        return "$number linhas afetada(s)";
    }

    protected function getDadosValida($DADOS)
    {
        $erros = [];
        $campo = [];
        
        foreach ($this->permitido as $col => $dados) {
            $params = explode('|', $dados['params']);
            $campo[$col] = isset($DADOS[$col]) ? $DADOS[$col] : null;
            $campoValor = reticencias(trim($campo[$col]),10);
            foreach ($params as $param) {

                //required
                if ($param == 'required' && empty(trim($campo[$col]))) {
                    $erros[] = "Campo '$dados[descricao]' é obrigatório";
                    //break;
                }

                //trim
                if ($param == 'trim') {
                    $campo[$col] = trim($campo[$col]);
                }

                //number
                if ($param == 'numeric' && !is_numeric($campo[$col])) {
                    $erros[] = "Campo '$dados[descricao]' ($campoValor) precisa ser numérico";
                }

                //max
                if (substr($param, 0, 3) == 'max') {
                    $max = explode(':', $param)[1];
                    if (strlen($campo[$col]) > $max) {
                        $erros[] = "Campo '$dados[descricao]' ($campoValor) é maior que o permitido. Informe até $max caracteres.";
                    }
                }

                //date
                if (substr($param, 0, 4) == 'date') {
                    $dateFormat = explode(':', $param)[1];
                    if (!dataValida($campo[$col], $dateFormat)) {
                        $erros[] = "Campo '$dados[descricao]' ($campoValor) não é uma data válida. Defina no formato $dateFormat.";
                    }
                }
            }
        }

        return [
            'dados' => $campo,
            'erros' => $erros
        ];
    }
}
