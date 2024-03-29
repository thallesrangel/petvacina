<?php

class Metrica extends model 
{   
     public function getEspecifico($id)
     {
        $array = array();
        $sql = "SELECT a.*, b.metrica_unidade as un_altura, c.metrica_unidade as un_comprimento FROM tbmetrica_animal a
        JOIN tbmetrica_unidade b ON (a.id_metrica_unidade_altura = b.id_metrica_unidade) 
        JOIN tbmetrica_unidade c ON (a.id_metrica_unidade_comprimento = c.id_metrica_unidade)
        WHERE id_animal = ".$id." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($idAnimal, $altura_animal, $id_metrica_unidade_altura, $comprimento_animal, $id_metrica_unidade_comprimento, $data_medida, $data_remedida)
    {     
        $sql = "INSERT INTO tbmetrica_animal(id_usuario, id_animal, altura, id_metrica_unidade_altura, comprimento, id_metrica_unidade_comprimento, data_medida, data_remedida) 
        VALUES(:id_usuario, :id_animal, :altura, :id_metrica_unidade_altura, :comprimento, :id_metrica_unidade_comprimento, :data_medida, :data_remedida)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':id_animal', $idAnimal);
        $sql->bindValue(':altura', $altura_animal);
        $sql->bindValue(':id_metrica_unidade_altura', $id_metrica_unidade_altura); 
        $sql->bindValue(':comprimento', $comprimento_animal);
        $sql->bindValue(':id_metrica_unidade_comprimento', $id_metrica_unidade_comprimento);     
        $sql->bindValue(':data_medida', $data_medida);
        $sql->bindValue(':data_remedida', $data_remedida);
   
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }  

    // Retorna Métrica especifico para editar
    public function getEspecificoDado($idAlturaAnimal)
    {
        $array = array();
        $sql = "SELECT * FROM tbmetrica_animal WHERE id_metrica_animal = ".$idAlturaAnimal." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($idMetrica, $altura_animal, $id_metrica_unidade_altura, $comprimento_animal, $id_metrica_unidade_comprimento, $data_medida, $data_remedida)
    {   
        $sql = "UPDATE tbmetrica_animal SET altura = :altura, id_metrica_unidade_altura = :id_metrica_unidade_altura, comprimento = :comprimento, id_metrica_unidade_comprimento = :id_metrica_unidade_comprimento, data_medida = :data_medida, data_remedida = :data_remedida
        WHERE id_metrica_animal = :id_metrica_animal AND id_usuario = ".$_SESSION['id_usuario']."";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_metrica_animal', $idMetrica);
        $sql->bindValue(':altura',$altura_animal);
        $sql->bindValue(':id_metrica_unidade_altura', $id_metrica_unidade_altura);
        $sql->bindValue(':comprimento',$comprimento_animal);
        $sql->bindValue(':id_metrica_unidade_comprimento', $id_metrica_unidade_comprimento);
        $sql->bindValue(':data_medida',$data_medida);
        $sql->bindValue(':data_remedida',$data_remedida);
  
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }

    public function delete($idMetricaAnimal)
    {
        $sql = "UPDATE tbmetrica_animal SET flag_excluido = :flag_excluido WHERE id_metrica_animal = :id_metrica_animal AND id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_metrica_animal', $idMetricaAnimal, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }

    # Usado em relatório 
	public function listarReport($proprietario)
	{   
        $array = array();
       
		$sql = "SELECT a.*, b.*, c.metrica_unidade as alturaUnidade, d.metrica_unidade as comprimentoUnidade, e.* FROM tbmetrica_animal a
            INNER JOIN tbanimal b ON (b.id_animal = a.id_animal)
            INNER JOIN tbmetrica_unidade c ON (c.id_metrica_unidade = a.id_metrica_unidade_altura)
            INNER JOIN tbmetrica_unidade d ON (d.id_metrica_unidade = a.id_metrica_unidade_comprimento)
            INNER JOIN tbproprietario e ON (e.id_proprietario = b.id_proprietario)
		WHERE a.id_usuario = ".$_SESSION['id_usuario']." AND e.id_proprietario IN(".implode(',', $proprietario).") AND a.flag_excluido = 0";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }
}