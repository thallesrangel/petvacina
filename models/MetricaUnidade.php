<?php

class MetricaUnidade extends model 
{
    public function getAll()
    {
        $array = array();
        $sql = "SELECT * FROM tbmetrica_unidade";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}