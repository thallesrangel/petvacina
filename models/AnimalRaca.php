<?php
class AnimalRaca extends model 
{
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbraca a
            INNER JOIN tbespecie b ON (b.id_especie = a.id_especie)
        WHERE a.flag_excluido = 0 AND a.id_usuario = ".$_SESSION['id_usuario']." OR a.flag_padrao = 1";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($nome_raca)
    {     
        
        $sql = "INSERT INTO tbraca (id_usuario, nome_raca) 
        VALUES(:id_usuario, :nome_raca)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':nome_raca', $nome_raca);
    
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
        $sql = "UPDATE tbraca SET flag_excluido = :flag_excluido WHERE id_raca = :id_raca";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_raca', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }

    public function getRaca($idRaca)
    {
        $array = array();

		$sql = "SELECT * FROM tbraca WHERE id_raca = :id_raca";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_raca", $idRaca);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
    }

    # Retorna Animal Espécie especifico para editar
    public function getEspecificoDado($idRaca)
    {
        $array = array();
        $sql = "SELECT * FROM tbraca WHERE id_raca = ".$idRaca." AND flag_excluido = 0 AND id_usuario = ".$_SESSION['id_usuario']." OR flag_padrao = 1";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($id_raca, $nome_raca)
    {   
        $sql = "UPDATE tbraca SET nome_raca = :nome_raca WHERE id_raca = :id_raca";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_raca', $id_raca);
        $sql->bindValue(':nome_raca',$nome_raca);
    
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }

}
