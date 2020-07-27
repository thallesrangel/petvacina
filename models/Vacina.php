<?php
class Vacina extends model 
{
    # Retorna vacinas especificas de um animal
    public function getEspecifico($id) {
        $array = array();
        $sql = "SELECT * FROM tbvacina WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }


    public function add($id_animal, $nome_vacina, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv)
    {     

        $sql = "INSERT INTO tbvacina (id_usuario, id_animal, titulo_vacina, data_aplicacao, data_revacinacao, nome_veterinario, registro_crmv, data_registro) 
        VALUES(:id_usuario, :id_animal, :titulo_vacina, :data_aplicacao, :data_revacinacao, :nome_veterinario, :registro_crmv,:data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $id_animal);
        $sql->bindValue(':titulo_vacina', $nome_vacina);
        $sql->bindValue(':data_aplicacao', $data_aplicacao);
        $sql->bindValue(':data_revacinacao', $data_revacinacao);
        $sql->bindValue(':nome_veterinario', $nome_veterinario);
        $sql->bindValue(':registro_crmv', $registro_crmv);
        $sql->bindValue(':data_registro', date('y-m-d')); 

        $sql->execute();

        if( $sql ) {
            return true;
        }
    }    
}
