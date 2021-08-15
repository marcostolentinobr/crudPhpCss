<?php

require_once RAIZ . '/modulos/Model.php';

class AtividadeModel extends Model
{
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

    //list
    public function list($where = [])
    {
        if ($where) {
            $this->select .= '
                WHERE A.id = :id
            ';
        }

        return $this->all($this->select, $where);
    }

    //insert
    public function insert($line)
    {
        $insert = '
            INSERT INTO ATIVIDADE 
            ( projeto_id,  nome,  data_inicio,  data_fim) VALUES 
            (:projeto_id, :nome, :data_inicio, :data_fim)
        ';
        return $this->prepExec($insert,  $line);
    }

    //delete
    public function delete($where)
    {
        $delete = '
            DELETE 
              FROM ATIVIDADE
             WHERE id = :id
        ';

        return $this->prepExec($delete, $where);
    }

    //update
    public function update($line, $where)
    {
        $delete = '
            UPDATE ATIVIDADE 
               SET projeto_id  = :projeto_id,
                   nome        = :nome,
                   data_inicio = :data_inicio,
                   data_fim    = :data_fim
             WHERE id = :id
        ';

        return $this->prepExec($delete, array_merge($line, $where));
    }
}
