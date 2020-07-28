<?php

class Anticio extends model 
{   

     # Retorna vacinas especificas de um animal
     public function getEspecifico($id) {
        $array = array();
        $sql = "SELECT * FROM tbanticio WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($id_animal, $nome_produto, $dose, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)
    {     
        
        $sql = "INSERT INTO tbanticio (id_usuario, id_animal, nome_produto, dose, data_aplicacao, data_prox_dose, nome_veterinario, registro_crmv, data_registro) 
        VALUES(:id_usuario, :id_animal, :nome_produto, :dose, :data_aplicacao, :data_prox_dose, :nome_veterinario, :registro_crmv,:data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $id_animal);
        $sql->bindValue(':nome_produto', $nome_produto);
        $sql->bindValue(':dose', $dose);
        $sql->bindValue(':data_aplicacao', $data_aplicacao);
        $sql->bindValue(':data_prox_dose', $data_prox_dose);
        $sql->bindValue(':nome_veterinario', $nome_veterinario);
        $sql->bindValue(':registro_crmv', $registro_crmv);
        $sql->bindValue(':data_registro', date('y-m-d')); 


        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            print_r($sql->errorInfo());
        }
    }

    public function delete($id)
    {
        $sql = "UPDATE tbanticio SET flag_excluido = :flag_excluido WHERE id_parasita = :id_parasita";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_anticio', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }
}