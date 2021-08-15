<?php

require_once RAIZ . '/modulos/Model.php';

class ProjetoModel extends Model
{
    //select
    private $select = '
        SELECT 
        
               -- projeto
               P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido

          FROM PROJETO P
    ';

    //insert
    public function insert($line)
    {
        $insert = '
            INSERT INTO PROJETO 
            ( nome,  data_inicio,  data_fim) VALUES 
            (:nome, :data_inicio, :data_fim)
        ';
        return $this->Pdo->prepExec($insert,  $line);
    }

    //list
    public function list($where = [])
    {
        if ($where) {
            $this->select .= '
                WHERE P.id = :id
            ';
        }

        return $this->Pdo->all($this->select, $where);
    }

    //delete
    public function delete($where)
    {
        $delete = '
            DELETE 
              FROM PROJETO
             WHERE id = :id
        ';

        return $this->Pdo->prepExec($delete, $where);
    }

    //update
    public function update($line, $where)
    {
        $delete = '
            UPDATE PROJETO 
               SET nome        = :nome,
                   data_inicio = :data_inicio,
                   data_fim    = :data_fim
             WHERE id = :id
        ';

        return $this->Pdo->prepExec($delete, array_merge($line, $where));
    }
}
