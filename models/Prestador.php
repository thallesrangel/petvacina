<?php

class Prestador extends model 
{
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbprestador WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}