<?php
class Usuario extends model 
{
	public function buscarUsuario($emailPost)
	{   
        $array = array();
        		
		$sql = "SELECT * FROM tbusuario WHERE email_usuario = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $emailPost); 
		$sql->execute();
	
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}