<?php

class PesoUnidade extends model 
{
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbpeso_unidade";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}