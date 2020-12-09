<?php
class AnimalEspecie extends model 
{
     // Retorna todos as especies de animais
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbespecie WHERE id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

     
}
