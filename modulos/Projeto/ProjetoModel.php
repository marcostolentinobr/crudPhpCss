<?php

require_once RAIZ . '/modulos/Model.php';

class ProjetoModel extends Model
{
    //select
    private $select = '
        SELECT 
        
               -- atividade 
               P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido
     
          FROM PROJETO P
    ';

    private $select_edit = '
        SELECT 
               -- atividade 
               P.id,
               P.nome,
               P.data_inicio,
               P.data_fim,
               P.data_concluido,
               P.projeto_id       
               
          FROM PROPJETO P
         WHERE P.id = :id
    ';

    //list
    public function list($where = [])
    {
        if ($where) {
            return $this->all($this->select_edit, $where);
        }

        return $this->all($this->select);
    }

    //insert
    public function insert($line)
    {
        $insert = '
            INSERT INTO PROJETO 
            ( nome,  data_inicio,  data_fim) VALUES 
            (:nome, :data_inicio, :data_fim)
        ';
        return $this->prepExec($insert,  $line);
    }

    //delete
    public function delete($where)
    {
        $delete = '
            DELETE 
              FROM PROJETO
             WHERE id = :id
        ';

        return $this->prepExec($delete, $where);
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

        return $this->prepExec($delete, array_merge($line, $where));
    }
}
