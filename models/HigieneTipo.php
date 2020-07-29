<?php

class HigieneTipo extends model 
{
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbhigiene_tipo";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}