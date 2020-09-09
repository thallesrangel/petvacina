<?php

class Fornecedor extends model 
{
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbfornecedor WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAllResumido() {
        $array = array();
        $sql = "SELECT * FROM tbfornecedor a 
        INNER JOIN tbfornecedor_tipo b ON (a.id_fornecedor_tipo = b.id_fornecedor_tipo) WHERE id_usuario = ". $_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($nome_fornecedor, $tipo_fornecedor)
    {     
        
        $sql = "INSERT INTO tbfornecedor (id_usuario, nome_fornecedor, id_fornecedor_tipo) 
        VALUES(:id_usuario, :nome_fornecedor, :id_fornecedor_tipo)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':nome_fornecedor', $nome_fornecedor);
        $sql->bindValue(':id_fornecedor_tipo', $tipo_fornecedor);
    
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }

    public function delete($idFornecedor)
    {
        $sql = "UPDATE tbfornecedor SET flag_excluido = :flag_excluido WHERE id_fornecedor = :id_fornecedor";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_fornecedor', $idFornecedor, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        
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