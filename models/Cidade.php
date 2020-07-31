<?php
class Cidade extends model {

	public function getCidades($idEstado) {
		$array = array();

		$sql = "SELECT * FROM tbcidade WHERE id_estado = :id_estado";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_estado", $idEstado);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

}