<?php
class Vermifugacao extends model 
{
    # Retorna vermifugacao especifica de um animal
    public function getEspecifico($id) {
        $array = array();
        $sql = "SELECT * FROM tbvermifugacao WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($id_animal, $nome_produto, $dose, $peso_animal, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)
    {     
        $sql = "INSERT INTO tbvermifugacao(id_usuario, id_animal, nome_produto, dose, peso, data_aplicacao, data_prox_dose, nome_veterinario, registro_crmv,data_registro) 
        VALUES(:id_usuario, :id_animal, :nome_produto, :dose, :peso, :data_aplicacao, :data_prox_dose, :nome_veterinario,:registro_crmv, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario',$_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $id_animal);
        $sql->bindValue(':nome_produto', $nome_produto);
        $sql->bindValue(':dose', $dose);
        $sql->bindValue(':peso', $peso_animal);
        $sql->bindValue(':data_aplicacao', $data_aplicacao);
        $sql->bindValue(':data_prox_dose', $data_prox_dose);
        $sql->bindValue(':nome_veterinario', $nome_veterinario);
        $sql->bindValue(':registro_crmv', $registro_crmv);
        $sql->bindValue(':data_registro', date('y-m-d')); 

        $sql->execute();

        if( $sql ) {
            return true;
        }
    }    
}
