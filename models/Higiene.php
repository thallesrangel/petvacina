<?php

class Higiene extends model 
{   
    public function getEspecifico($id) {
        $array = array();
        $sql = "SELECT a.*, b.*, c.* FROM tbhigiene a 
        INNER JOIN tbhigiene_tipo b ON (b.id_higiene_tipo = a.id_higiene_tipo)
        INNER JOIN tbprestador c ON (c.id_prestador = a.id_prestador)
        WHERE id_animal = ".$id." AND a.id_usuario = ".$_SESSION['id_usuario']." AND a.flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($id_animal, $id_higiene_tipo, $id_prestador, $data_servico, $data_prox_servico)
    {     
        
        $sql = "INSERT INTO tbhigiene (id_usuario, id_animal, id_higiene_tipo, id_prestador, data_servico, data_prox_servico, data_registro) 
        VALUES(:id_usuario, :id_animal, :id_higiene_tipo, :id_prestador, :data_servico, :data_prox_servico, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $id_animal);
        $sql->bindValue(':id_higiene_tipo', $id_higiene_tipo);
        $sql->bindValue(':id_prestador', $id_prestador);
        $sql->bindValue(':data_servico', $data_servico);
        $sql->bindValue(':data_prox_servico', $data_prox_servico);
        $sql->bindValue(':data_registro', date('y-m-d')); 

        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }

    public function delete($id)
    {
        $sql = "UPDATE tbhigiene SET flag_excluido = :flag_excluido WHERE id_higiene = :id_higiene";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_higiene', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }
}