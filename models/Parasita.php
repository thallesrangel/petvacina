<?php

class Parasita extends model 
{   

     # Retorna vacinas especificas de um animal
     public function getEspecifico($id)
     {
        $array = array();
        $sql = "SELECT * FROM tbparasita a
        JOIN tbpeso_unidade b ON (a.id_peso_unidade = b.id_peso_unidade)
        
        WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($id_animal, $nome_produto, $dose, $peso_animal, $id_peso_unidade, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)
    {     
        
        $sql = "INSERT INTO tbparasita (id_usuario, id_animal, id_peso_unidade, nome_produto, dose, peso, data_aplicacao, data_prox_dose, nome_veterinario, registro_crmv, data_registro) 
        VALUES(:id_usuario, :id_animal, :id_peso_unidade, :nome_produto, :dose, :peso, :data_aplicacao, :data_prox_dose, :nome_veterinario, :registro_crmv,:data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $id_animal);
        $sql->bindValue(':id_peso_unidade', $id_peso_unidade);
        $sql->bindValue(':nome_produto', $nome_produto);
        $sql->bindValue(':dose', $dose);
        $sql->bindValue(':peso', $peso_animal);
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
        $sql = "UPDATE tbparasita SET flag_excluido = :flag_excluido WHERE id_parasita = :id_parasita AND id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_parasita', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }

    // Retorna vacina especifico para editar
    public function getEspecificoDado($idParasita)
    {
        $array = array();
        $sql = "SELECT * FROM tbparasita WHERE id_parasita = ".$idParasita." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($idParasita, $nome_produto, $dose, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)
    {   
        $sql = "UPDATE tbvacina SET id_parasita = :id_parasita, nome_produto = :nome_produto, dose = :dose, data_aplicacao = :data_aplicacao, data_prox_dose = :data_prox_dose,
        nome_veterinario = :nome_veterinario, registro_crmv = :registro_crmv
        WHERE id_parasita = :id_parasita AND id_usuario = ".$_SESSION['id_usuario']."";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_parasita', $idParasita);
        $sql->bindValue(':nome_produto',$nome_produto);
        $sql->bindValue(':dose',$dose);
        $sql->bindValue(':data_aplicacao',$data_aplicacao);
        $sql->bindValue(':data_prox_dose',$data_prox_dose);
        $sql->bindValue(':nome_veterinario',$nome_veterinario);
        $sql->bindValue(':registro_crmv',$registro_crmv);
        
        if ($sql->execute()) {  
            $count = $sql->rowCount();
            echo $count . 'Feito!';
            //return true;
        } else {
            //return false;
            print_r($sql->errorInfo());
        }
    }

    # Usado em relatório 
	public function listarReport($proprietario)
	{   
        $array = array();
       
		$sql = "SELECT a.*, b.*, c.* FROM tbparasita a
			INNER JOIN tbanimal b ON (b.id_animal = a.id_animal)
            INNER JOIN tbpeso_unidade c ON (c.id_peso_unidade = a.id_peso_unidade)
		WHERE a.id_usuario = ".$_SESSION['id_usuario']."
        AND b.id_proprietario IN(".implode(',', $proprietario).") AND a.flag_excluido = 0";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }
}