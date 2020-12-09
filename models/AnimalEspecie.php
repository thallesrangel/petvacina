<?php
class AnimalEspecie extends model 
{
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbespecie WHERE flag_excluido = 0 AND id_usuario = ".$_SESSION['id_usuario']." OR flag_padrao = 1";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($nome_especie)
    {     
        
        $sql = "INSERT INTO tbespecie (id_usuario, nome_especie) 
        VALUES(:id_usuario, :nome_especie)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':nome_especie', $nome_especie);
    
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
        $sql = "UPDATE tbespecie SET flag_excluido = :flag_excluido WHERE id_especie = :id_especie";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_especie', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }

    public function getEspecie($idEstado)
    {
        $array = array();

		$sql = "SELECT * FROM tbraca WHERE id_especie = :id_especie";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_especie", $idEstado);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
    }

}
