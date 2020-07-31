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

    public function getExisteEmail($email)
    {   
        $sql = "SELECT * FROM tbusuario WHERE email_usuario = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
    }

    public function add($nome_usuario, $sobrenome_usuario, $email_usuario, $senha, $id_estado, $id_cidade)
    {     
        
        $sql = "INSERT INTO tbusuario (nome_usuario, sobrenome_usuario, email_usuario, senha, id_estado, id_cidade, data_registro) 
        VALUES(:nome_usuario, :sobrenome_usuario, :email_usuario, :senha, :id_estado, :id_cidade, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':nome_usuario', $nome_usuario);
        $sql->bindValue(':sobrenome_usuario', $sobrenome_usuario);
        $sql->bindValue(':email_usuario', $email_usuario);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':id_estado', $id_estado);
        $sql->bindValue(':id_cidade', $id_cidade);
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
}