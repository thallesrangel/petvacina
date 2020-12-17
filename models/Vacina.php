<?php

class Vacina extends model 
{
    # Retorna vacinas especificas de um animal
    public function getEspecifico($id)
    {
        $array = array();
        $sql = "SELECT * FROM tbvacina WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0 ORDER BY data_aplicacao DESC";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAll()
    {
        $array = array();
        $sql = "SELECT * FROM tbvacina a
        WHERE a.id_usuario = ".$_SESSION['id_usuario']." AND a.flag_excluido = 0";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }


    public function add($id_animal, $nome_vacina, $dose, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv)
    {     

        $sql = "INSERT INTO tbvacina (id_usuario, id_animal, titulo_vacina, dose, data_aplicacao, data_revacinacao, nome_veterinario, registro_crmv, data_registro) 
        VALUES(:id_usuario, :id_animal, :titulo_vacina, :dose, :data_aplicacao, :data_revacinacao, :nome_veterinario, :registro_crmv,:data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $id_animal);
        $sql->bindValue(':titulo_vacina', $nome_vacina);
        $sql->bindValue(':dose', $dose);
        $sql->bindValue(':data_aplicacao', $data_aplicacao);
        $sql->bindValue(':data_revacinacao', $data_revacinacao);
        $sql->bindValue(':nome_veterinario', $nome_veterinario);
        $sql->bindValue(':registro_crmv', $registro_crmv);
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

    public function count()
    {
        $array = array();
        $sql = "SELECT count(*) as qtd FROM tbvacina WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }


    public function delete($id)
    {
        $sql = "UPDATE tbvacina SET flag_excluido = :flag_excluido WHERE id_vacina = :id_vacina AND id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_vacina', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }

    // Retorna vacina especifico para editar
    public function getEspecificoDado($idVacina)
    {
        $array = array();
        $sql = "SELECT * FROM tbvacina WHERE id_vacina = ".$idVacina." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($idVacina, $titulo_vacina, $dose, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv)
    {   
        $sql = "UPDATE tbvacina SET id_vacina = :id_vacina, titulo_vacina = :titulo_vacina, dose = :dose, data_aplicacao = :data_aplicacao, data_revacinacao = :data_revacinacao,
        nome_veterinario = :nome_veterinario, registro_crmv = :registro_crmv
        WHERE id_vacina = :id_vacina AND id_usuario = ".$_SESSION['id_usuario']."";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_vacina', $idVacina);
        $sql->bindValue(':titulo_vacina',$titulo_vacina);
        $sql->bindValue(':dose',$dose);
        $sql->bindValue(':data_aplicacao',$data_aplicacao);
        $sql->bindValue(':data_revacinacao',$data_revacinacao);
        $sql->bindValue(':nome_veterinario',$nome_veterinario);
        $sql->bindValue(':registro_crmv',$registro_crmv);
        
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . 'Feito!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }

     # Usado em relatório 
	public function listarReport($proprietario)
	{   
        $array = array();
       
		$sql = "SELECT a.*, b.* FROM tbvacina a
			INNER JOIN tbanimal b ON (b.id_animal = a.id_animal)
		WHERE a.id_usuario = ".$_SESSION['id_usuario']." AND b.id_proprietario IN(".implode(',', $proprietario).") AND a.flag_excluido = 0";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }
}
