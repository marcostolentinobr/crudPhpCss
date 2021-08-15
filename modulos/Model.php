<?php
require_once RAIZ . '/libs/Conexao.php';
class Model extends Conexao
{
    public function __construct()
    {
        parent::__construct(DB_NAME, DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_CHARSET);
    }

    //list
    public function list($where = [])
    {
        if ($where) {
            return $this->all($this->select_edit, $where);
        }

        return $this->all($this->select);
    }

    //insert
    public function insert($valores)
    {
        $dados = $this->dadosQry($valores, true);
        $insert = "INSERT INTO $this->tabela  ( " . implode(", ", $dados['col']);
        $insert .= ') VALUES ( :' . implode(", :", $dados['col']) . ')';
        return $this->prepExec($insert,  $valores);
    }

    protected function dadosQry($dados, $insert = false)
    {
        $ITEM = [];
        $ITEM['col'] = [];
        $ITEM['val'] = [];
        foreach ($dados as $coluna => $valor) {
            if ($insert) {
                $ITEM['col'][] = "$coluna";
            } else {
                $ITEM['col'][] = "$coluna=:$coluna";
            }
            $key = ":$coluna";
            $ITEM['val'][$key] = $valor;
        }
        return $ITEM;
    }

    //delete
    public function delete($where)
    {
        $dadoswhere = $this->dadosQry($where, false);
        $delete = "DELETE FROM $this->tabela ";
        $delete .= ' WHERE ' . implode(' AND ', $dadoswhere['col']);
        return $this->prepExec($delete, $where);
    }

    //update
    public function update($valores, $where)
    {
        $dados = $this->dadosQry($valores, false);
        $dadosWhere = $this->dadosQry($where, false);
        $delete = "UPDATE $this->tabela SET " . implode(", ", $dados['col']);
        $delete .= ' WHERE ' . implode(' AND ', $dadosWhere['col']);
        return $this->prepExec($delete, array_merge($valores, $where));
    }
}
