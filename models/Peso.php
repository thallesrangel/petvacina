<?php

class Peso extends model 
{   
     public function getEspecifico($id) {
        $array = array();
        $sql = "SELECT a.*, b.* FROM tbpeso_animal a
        JOIN tbpeso_unidade b ON (a.id_peso_unidade = b.id_peso_unidade) WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    // Retorna anticio especifico para editar
    public function getEspecificoDado($idPesoAnimal)
    {
        $array = array();
        $sql = "SELECT * FROM tbpeso_animal WHERE id_peso_animal = ".$idPesoAnimal." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
 
        
    public function add($idAnimal, $peso_animal, $id_peso_unidade, $data_pesagem, $data_repesagem)
    {     
        $sql = "INSERT INTO tbpeso_animal(id_usuario, id_animal, peso, id_peso_unidade, data_pesagem, data_repesagem) 
        VALUES(:id_usuario, :id_animal, :peso, :id_peso_unidade, :data_pesagem, :data_repesagem)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $idAnimal);
        $sql->bindValue(':peso', $peso_animal);
        $sql->bindValue(':id_peso_unidade', $id_peso_unidade);      
        $sql->bindValue(':data_pesagem', $data_pesagem);
        $sql->bindValue(':data_repesagem', $data_repesagem);
   
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }   


    public function edit($idPeso, $peso_animal, $id_peso_unidade, $data_pesagem, $data_repesagem)
    {   
        $sql = "UPDATE tbpeso_animal SET  peso = :peso, id_peso_unidade = :id_peso_unidade, data_pesagem = :data_pesagem, data_repesagem = :data_repesagem
        WHERE id_peso_animal = :id_peso_animal";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_peso_animal', $idPeso);
        $sql->bindValue(':peso',$peso_animal);
        $sql->bindValue(':id_peso_unidade', $id_peso_unidade);
        $sql->bindValue(':data_pesagem',$data_pesagem);
        $sql->bindValue(':data_repesagem',$data_repesagem);
  
        if ($sql->execute()) {  
            $count = $sql->rowCount();
            echo $count . ' rows updated properly!';
            //return true;
        } else {
            //return false;
            print_r($sql->errorInfo());
        }
    }

    
    public function delete($idPesoAnimal)
    {
        $sql = "UPDATE tbpeso_animal SET flag_excluido = :flag_excluido WHERE id_peso_animal = :id_peso_animal";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_peso_animal', $idPesoAnimal, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }
}